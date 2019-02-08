<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserProfile::class, function (Faker $faker) {
    return [
        'location' => sprintf('%s, Indonesia', $faker->city),
        'bio'      => $faker->sentence,
    ];
});
