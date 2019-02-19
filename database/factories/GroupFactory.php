<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin\AttributeGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});
