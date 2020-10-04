<?php

namespace App\Http\Livewire;

use App\ClientInterface;
use Livewire\Component;

class SubmitLink extends Component
{
    public $title;
    public $name;
    public $email;
    public $website;
    public $description;
    public $tags;
    public $avaliableTags;
    public $response;

    protected array $rules = [
        'title' => 'required',
        'name' => 'required',
        'email' => 'email|required',
        'website' => 'required',
        'description' => 'required',
        'tags' => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->client = resolve(ClientInterface::class);
        $this->avaliableTags = $this->client->getTags()->all();
    }


    public function submit(): void
    {
        $this->dumpData();
        $this->validate();

        $this->tags = collect($this->tags)->filter(function ($item) {
            return $item === true;
        })->all();


        $this->response = null;
        $this->response = $this->client->submitLink([
            'title' => $this->title,
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'description' => $this->description,
            'tags' => $this->tags,
        ]);
    }

    public function render()
    {
        return view('livewire.submit-link');
    }

    private function dumpData(): void
    {
        dd(
            $this->title,
            $this->name,
            $this->email,
            $this->website,
            $this->description,
            $this->tags,
        );
    }
}
