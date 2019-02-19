<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Attribute::class, function (Faker $faker) {
    return [
        'group_id' => function(){
            return factory(App\Models\Admin\AttributeGroup::class)->create()->id;
        },
        'name' => $faker->unique()->word,
    ];
});
