<?php

namespace Database\Seeders;

use App\Models\{Post, Image};
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
        $posts = Post::factory(50)->create();

        foreach($posts as $post){
            Image::factory(3)->create([
                'status'      => '1',
                'post_id'     => $post->id,
                'title'        => $post->title,
            ]);
            $post->tags()->attach([
                rand(1, 10),
                rand(11, 20),
            ]);
        }
    }
}
