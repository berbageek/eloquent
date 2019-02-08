<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Post::class)->times(10)->make()->each(function ($post) {
            $post->author()->associate(factory(\App\Models\User::class)->create());
            $post->save();
        });
    }
}
