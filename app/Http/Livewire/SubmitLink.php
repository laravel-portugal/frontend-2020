<?php

namespace App\Http\Livewire;

use App\Http\Clients\ApiClient;
use App\Http\Crawlers\OpenGraphMetaCrawler;
use App\Rules\UniqueLink;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Browsershot\Browsershot;

class SubmitLink extends Component
{
    use WithFileUploads;

    protected ApiClient $client;
    protected OpenGraphMetaCrawler $crawler;
    protected array $config;

    public $title;
    public $name;
    public $email;
    public $website;
    public $description;
    public $tags;
    public $avaliableTags;
    public $response;
    public $photo;
    public $generatedPhoto;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->crawler = new OpenGraphMetaCrawler();
        $this->config = config('laravel-portugal.links');
        $this->client = resolve(ApiClient::class);
    }

    public function mount(): void
    {
        $this->avaliableTags = $this->client->getTags();
    }

    public function updatedWebsite(): void
    {
        $this->validate(['website' => $this->getRules()['website']]);
    }

    public function generateCoverImage(): void
    {
        $this->generatedPhoto = $this->getOGImage() ?? $this->getBrowserShotImage();
    }

    public function clearPhoto(): void
    {
        $this->photo = null;
    }

    public function submit(): void
    {
        $this->validate($this->getRules());

        $this->tags = collect($this->tags)->filter()->all();

        $this->response = $this->client->submitLink([
            'title' => $this->title,
            'author_name' => $this->name,
            'author_email' => $this->email,
            'link' => $this->website,
            'description' => $this->description,
            'tags' => $this->tags,
        ])->json();
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

    protected function getOGImage(): ?string
    {
        return $this->crawler
            ->crawl($this->website)
            ->getOGImage();
    }

    protected function getBrowserShotImage(): ?string
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
        } catch (\Exception $exception) {
            return null;
        }
    }
}
