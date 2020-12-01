<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            abort(1, 'I will not run in production, period!');
        }

        \App\Models\User::query()->firstOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Admin User',
                'account_type' => 'admin',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'trusted' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
