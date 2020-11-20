<?php

namespace App\Http\Livewire;

use App\Http\Clients\ApiClient;
use App\Http\Crawlers\OpenGraphMetaCrawler;
use App\Rules\UniqueLink;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Browsershot\Browsershot;

class SubmitLink extends Component
{
    use WithFileUploads;

    public $title;
    public $name;
    public $email;
    public $website;
    public $description;
    public $tags;
    public $availableTags;
    public $response;
    public $photo;
    public $generatedPhoto;
    // Protected
    protected ApiClient $client;
    protected OpenGraphMetaCrawler $crawler;
    protected array $config;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->crawler = new OpenGraphMetaCrawler();
        $this->config = config('laravel-portugal.links');
        $this->client = resolve(ApiClient::class);
    }

    public function mount()
    {
        $this->availableTags = $this->client->getTags();
    }

    public function updatedWebsite()
    {
        $this->validate(['website' => $this->getRules()['website']]);
    }

    public function generateCoverImage()
    {
        $this->generatedPhoto = $this->getOGImage() ?? $this->getBrowserShotImage();
    }

    public function clearPhoto()
    {
        $this->photo = null;
    }

    public function submit()
    {
        $this->validate($this->getRules());

        $tags = collect($this->tags)
            ->filter()
            ->map(fn ($tag) => ['id' => $tag])
            ->all();

        if ($this->photo) {
            $photo = Storage::path($this->photo->store('cover_images_photo'));
        }

        $this->response = $this->client->submitLink(
            [
                'title' => $this->title,
                'author_name' => $this->name,
                'author_email' => $this->email,
                'link' => $this->website,
                'description' => $this->description,
                'tags' => $tags,
            ],
            $photo ?? $this->generatedPhoto
        )->json();
    }

    public function render()
    {
        return view('livewire.submit-link');
    }

    protected function getRules()
    {
        return [
            'title' => 'required',
            'name' => 'required',
            'email' => 'email|required',
            'website' => ['required', 'active_url', new UniqueLink()],
            'description' => 'required',
            'tags' => 'required',
        ];
    }

    protected function getOGImage()
    {
        return $this->crawler
            ->crawl($this->website)
            ->getOGImage();
    }

    protected function getBrowserShotImage()
    {
        $targetFile = $this->config['storage']['path'] . '/' . uniqid() . '.' . $this->config['cover_image']['format'];
        $targetPath = Storage::disk('public')
            ->path($targetFile);

        $img = null;
        try {
            Storage::disk('public')
                ->makeDirectory($this->config['storage']['path']);

            Browsershot::url($this->website)
                ->dismissDialogs()
                ->ignoreHttpsErrors()
                ->setScreenshotType(
                    $this->config['cover_image']['format'],
                    $this->config['cover_image']['quality']
                )
                ->windowSize(
                    $this->config['cover_image']['size']['w'],
                    $this->config['cover_image']['size']['h']
                )
                ->save($targetPath);

            return URL::to($targetFile);
        } catch (Exception $exception) {
            return null;
        }
    }
}
