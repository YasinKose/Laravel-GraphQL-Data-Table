<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            Post::create([
                'title' => 'Lorem ipsum seeder example ' . $i,
                'content' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example ' . $i,
            ]);
        }
    }
}
