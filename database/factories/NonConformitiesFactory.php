<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\NonConformities;
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

$factory->define(NonConformities::class, function (Faker $faker) {
    return [
        'year' => $faker->sentence(),
        'quater' => $faker->sentence(),
        'rootCause' => $faker->sentence(),
        'openClosed' => $faker->sentence(),
        'correction' => $faker->sentence(),
        'correctiveAction' => $faker->sentence(),
        'date' => $faker->dateTimeBetween('-30 years', 'now'),
        'keyPerfomanceIndicator_id' => random_int(1, 10),
        'strategicObjective_id' => random_int(1, 10),
        'perspective_id' => random_int(1, 10),
        'program_id' => random_int(1, 10)
    ];
});
