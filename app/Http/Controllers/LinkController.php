<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function create()
    {
        return view('submit-link');
    }
}
