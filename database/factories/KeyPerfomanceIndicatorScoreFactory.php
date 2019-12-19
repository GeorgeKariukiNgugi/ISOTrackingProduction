<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\KeyPerfomanceIndicatorScore;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(KeyPerfomanceIndicatorScore::class, function (Faker $faker) {
    return [
        'year' => $faker->sentence(),
        'ytd' => $faker->sentence(),
        'keyPerfomanceIndicator_id' => random_int(1, 10),
        'strategicObjective_id' => random_int(1, 10),
        'score' => $faker->sentence()
    ];
});
