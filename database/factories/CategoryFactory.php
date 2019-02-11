<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Category::class, function (Faker $faker) {
    return [
        'parent_id' => $faker->numberBetween(0, 10),
        'name' => $slug = $faker->unique()->word,
        'slug' => $slug,
        'status' => $faker->numberBetween(0, 1),
    ];
});
