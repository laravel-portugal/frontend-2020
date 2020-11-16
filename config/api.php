<?php

 return [
     /**
      * In order to run and seed the local api, it's convenient to have the api project seeding its
      * database using it's own project. Here, we define its relative path to this project root.
      *
      */
     'relative_path' => env('API_RELATIVE_FOLDER', './../api.laravel.pt'),
 ];
