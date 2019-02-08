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

    }
}
