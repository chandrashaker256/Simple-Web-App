<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotelpackage;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Hotelpackage::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +2 days');
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 1500, $max = 6000),
        'days' => $faker->numberBetween($min = 1, $max = 10, $psychologicalPrice = true, $decimals = false),
        'nights' => $faker->numberBetween($min = 1, $max = 10, $psychologicalPrice = true, $decimals = false),
        'location' => $faker->state,
        'activated_date' => $start,
        'expired_date' => $end,
        'description' => $faker->text,
    ];
});
