<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Link extends Component
{
    public array $link;

    public function render()
    {
        return view('livewire.link');
    }

    public function mount(array $link): void
    {
        $this->link;
    }
}
