<?php

namespace App\Http\Clients\Domains;

use Carbon\Carbon;

trait TagsFakeClient
{
    public function getTags()
    {
        return $this->response = collect([
            [
                'id' => 1,
                'name' => 'laravel',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'database',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'nova',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'design patterns',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
