<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            abort(1, 'I will not run in production, period!');
        }
        $this->call(LinksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
