<?php

use Faker\Generator as Faker;

$factory->define(App\MainTopic::class, function (Faker $faker) {
    return [
        'name' => $name=$faker->sentence(2),
        'slug' => str_slug($name),
        'description' => $faker->paragraph(3),
        'filename' => $name,
        'order' => 1,
        'is_used' => true,
    ];
});
