<?php

namespace App\Http\Livewire;

use App\Http\Clients\ApiClient;
use App\Rules\UniqueLink;
use Livewire\Component;

class SubmitLink extends Component
{
    protected $client;

    public $title;
    public $name;
    public $email;
    public $website;
    public $description;
    public $tags;
    public $avaliableTags;
    public $response;

    public function mount()
    {
        $client = resolve(ApiClient::class);
        $this->avaliableTags = $client->getTags();
    }

    public function updatedWebsite()
    {
        $this->validate(['website' => $this->getRules()['website']]);
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
