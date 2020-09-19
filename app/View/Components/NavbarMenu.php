<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavbarMenu extends Component
{
    public $links = [
        'Welcome' => '/',
        'Login' => '/login',
        'Submit link' => '/submit-link',
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar-menu');
    }
}
