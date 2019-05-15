<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\AuthorityApi::class, function (Faker $faker) {
    return [
        'authority_id' => App\Authority::all()->random()->authority_id,
        'username' => $faker->userName,
        'password' => Hash::make('password'),
        'start_date' => $startDate =Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp()),
        'expiry_date' => Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addYear(),
        'isActive' => true,
    ];
});
