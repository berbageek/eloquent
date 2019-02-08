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
        $topics = \App\Models\Topic::all();

        factory(\App\Models\Post::class)->times(10)->make()->each(function ($post) use($topics) {
            $post->author()->associate(factory(\App\Models\User::class)->create());
            $post->save();
            $post->topics()->sync($topics->random(3));
        });
    }
}
