<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Link extends Component
{
    public array $link;
    public ?string $gravatar;

    public function render()
    {
        return view('livewire.link');
    }

    public function mount(): void
    {
        $hash           = md5(strtolower(trim($this->link['author_email'])));
        $this->gravatar = "http://www.gravatar.com/avatar/{$hash}?d=404";
        $response       = Http::get($this->gravatar);
        if ( ! $response->ok()) {
            $this->gravatar = null;
        }
    }
}
