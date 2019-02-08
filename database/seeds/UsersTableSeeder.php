<?php

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
        factory(\App\Models\User::class)->times(10)->make()->each(function ($user) {
            $user->save();
            $user->profile()->save(factory(\App\Models\UserProfile::class)->make());
        });
    }
}
