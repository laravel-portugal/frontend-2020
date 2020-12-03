<?php

namespace Database\Seeders;

use Domains\Links\Models\Link;
use Domains\Tags\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class LinksTableSeeder extends Seeder
{
    public function run()
    {
        if (app()->environment('production')) {
            abort(1, 'I will not run in production, period!');
        }

        $seedLinks = [
            [
                'link' => 'https://www.laravel.pt?name=laravel_livewire_explained',
                'title' => 'Livewire de fio a pavio',
                'description' => 'Uma página sobre Livewire.',
                'author_name' => 'Artisan One',
                'cover_image' => 'https://fakeimg.pl/350x200/?text=Artisan_One&font=lobster',
                'author_email' => 'artisan_one@laravel.pt',
                'approved_at' => Carbon::now(),
                'tags' => [
                    ['name' => 'Laravel'],
                    ['name' => 'Livewire'],
                ],
            ],
            [
                'link' => 'https://www.laravel.pt?name=vuejs_on_the_spotlight',
                'title' => 'VueJS em 2020',
                'description' => 'Um artigo sobre VueJS.',
                'author_name' => 'Artisan Two',
                'cover_image' => 'https://fakeimg.pl/350x200/?text=Artisan_Two&font=lobster',
                'author_email' => 'artisan_two@laravel.pt',
                'approved_at' => Carbon::now(),
                'tags' => [
                    ['name' => 'Vue'],
                    ['name' => 'Javascript'],
                ],
            ],
        ];
        // Let's make sure all tags exist in database.
        collect(data_get($seedLinks, '*.tags'))
            ->flatten(1)
            ->unique()
            ->each(function ($item) {
                Tag::query()->firstOrCreate([ 'name' => $item['name'] ]);
            });
        // Now insert Links and safely relate them.
        collect($seedLinks)->each(function ($seedLink) {
            // Create The link
            $link = Link::query()->firstOrCreate(Arr::except($seedLink, 'tags'));
            // Attach the (already persisted) related tags.
            foreach ($seedLink['tags'] as $tag) {
                $link->tags()->attach(
                    Tag::query()->firstWhere('name', $tag['name'])
                );
            }
        });
    }
}
