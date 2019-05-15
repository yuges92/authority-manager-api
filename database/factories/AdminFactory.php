<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firstName' => 'Yugeswaram',
        'lastName' => 'Sivanathan',
        'role' => 'Developer',
        'password' => Hash::make('password'),
        'email' => 'sivayuges@gmail.com',
    ];
});
