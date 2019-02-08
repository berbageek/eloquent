<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['PHP', 'Java', 'Javascript', 'MySQL', 'Oracle', 'CSS', 'React', 'VueJS', 'Angular'] as $name) {
            factory(\App\Models\Topic::class)->create(['name' => $name]);
        };
    }
}
