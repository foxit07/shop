<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Characteristics::class, function (Faker $faker) {
    return [
        'group_id' => function(){
            return factory(App\Models\Admin\Group::class)->create()->id;
        },
        'name' => $faker->unique()->word,
    ];
});
