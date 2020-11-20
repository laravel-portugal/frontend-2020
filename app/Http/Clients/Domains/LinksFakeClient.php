<?php

namespace App\Http\Clients\Domains;

trait LinksFakeClient
{
    public function submitLink($data, $coverImage)
    {
        return [
            'status' => 1,
            'message' => 'Link submetido com sucesso.',
        ];
    }

    public function getRecentLinks()
    {
        return collect([
            'data' => [
                [
                    'id' => 1,
                    'title' => 'Boost your conversion rate',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                    'author_name' => 'Roel Aufderhar',
                    'author_email' => 'me@pedrovasconcelos.com',
                    'cover_image' => 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
                    'created_at' => '2020-09-19 16:49:31.229524',
                ],
                [
                    'id' => 2,
                    'title' => 'How to use search engine optimization to drive sales',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                    'author_name' => 'Brenna Goyette',
                    'author_email' => 'brenna.goyette@gmail.com',
                    'cover_image' => 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80',
                    'created_at' => '2020-09-19 16:49:31.229524',
                ],
                [
                    'id' => 3,
                    'title' => 'Improve your customer experience',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.',
                    'author_name' => 'Daniela Metz',
                    'author_email' => 'brenna.goyette@gmail.com',
                    'cover_image' => 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80',
                    'created_at' => '2020-09-19 16:49:31.229524',
                ],
            ],
        ]);
    }
}
