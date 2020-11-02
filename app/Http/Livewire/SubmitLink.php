<?php

namespace App\Http\Livewire;

use App\Http\Clients\ApiClient;
use App\Rules\UniqueLink;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitLink extends Component
{
    use WithFileUploads;

    protected $client;

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

    public function mount(): void
    {
        $client = resolve(ApiClient::class);
        $this->avaliableTags = $client->getTags();
    }

    public function updatedWebsite(): void
    {
        $this->validate(['website' => $this->getRules()['website']]);
        // TODO: generate the cover_photo from the url. For now just do:
        $this->generatedPhoto = 'https://picsum.photos/200/300';
    }

    public function clearPhoto(): void
    {
        $this->photo = null;
    }

    public function submit(): void
    {
        $this->validate($this->getRules());

        $this->tags = collect($this->tags)->filter()->all();

        /** @var \App\Http\Clients\ApiClient $client */
        $client = resolve(ApiClient::class);

        $this->response = $client->submitLink([
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
}
