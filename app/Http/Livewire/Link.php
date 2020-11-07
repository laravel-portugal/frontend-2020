<?php

namespace App\Http\Livewire;

use App\Actions\ChecksEmailHasGravatar;
use Livewire\Component;

class Link extends Component
{
    public $link;
    public $gravatar;

    public function render()
    {
        return view('livewire.link');
    }

    public function mount(): void
    {
        $this->gravatar = resolve(ChecksEmailHasGravatar::class)($this->link['author_email']);
    }
}
