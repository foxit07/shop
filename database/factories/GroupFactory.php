<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});
