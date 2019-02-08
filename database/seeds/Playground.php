<?php

use Illuminate\Database\Seeder;

class Playground extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Insert ke satu table
        */

        // Cara 1
        $data = ['name' => 'Ahmadi', 'email' => 'ahmadi@javan.co.id', 'password' => bcrypt('asdf1234')];
        \Illuminate\Support\Facades\DB::table('users')->insert($data);

        // Cara 2
        $user = new \App\Models\User();
        $user->name = 'Citra Kirana';
        $user->email = 'citra@javan.co.id';
        $user->password = bcrypt('asdf1234');
        $user->save();

        // Cara 3
        $data = ['name' => 'Bayu Hendra', 'email' => 'bayu.hendra@javan.co.id', 'password' => bcrypt('asdf1234')];
        \App\Models\User::create($data);

        /*
         * Insert relasi hasOne
        */

        // Cara 1
        $data = ['location' => 'Jogja', 'bio' => 'Programmer at Javan', 'user_id' => 1];
        \Illuminate\Support\Facades\DB::table('user_profiles')->insert($data);

        // Cara 2
        $profile = new \App\Models\UserProfile();
        $profile->location = 'Sragen';
        $profile->bio = 'Anak Petani Kode';
        $profile->user_id = 2;
        $profile->save();

        // Cara 3
        $user = \App\Models\User::first();
        $profile = \App\Models\UserProfile::make(['location' => 'Bandung', 'bio' => 'Urang Deuy']);
        $user->profile()->save($profile);

        /*
         * Insert relasi hasMany
        */
        $post = \App\Models\Post::make(['title' => 'Laravel For Beginner', 'content' => '...']);
        $post->author()->associate($user);
        $post->save();

        // Cara 1
        $data = ['content' => 'Cakep bro', 'post_id' => 1, 'author_id' => 1];
        \App\Models\Comment::create($data);

        // Cara 2
        $comment = new \App\Models\Comment(['content' => 'Lanjutkan gan']);
        $comment->author()->associate($user);
        $comment->post()->associate($post);
        $comment->save();

        /*
         * Insert relasi many to many
        */
        $this->call(TopicsTableSeeder::class);

        $post = \App\Models\Post::first();
        // $post->topics()->attach(\App\Models\Topic::first());
        // $post->topics()->detach(\App\Models\Topic::first());
        // $post->topics()->attach(\App\Models\Topic::get()->random());
        $post->topics()->sync(\App\Models\Topic::get()->random(5));
        $post->topics()->sync([]);
    }
}
