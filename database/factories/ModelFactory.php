<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Video::class, function(Faker\Generator $faker){
    return [
        'nom' => $faker->name,
        'duree' => $faker->numberBetween(0, 10000),
        'resume' => $faker->text(),
        'sortie' => $faker->date()
    ];
});

$factory->define(App\Serie::class, function(Faker\Generator $faker){
    return [
        'nom' => $faker->name,
        'resume' => $faker->text(),
        'debut' => $faker->date()
    ];
});

$factory->define(App\Saison::class, function(Faker\Generator $faker){
    return [
        'numero' => $faker->numberBetween(1, 40),
        'resume' => $faker->text(),
        'debut' => $faker->date()
    ];
});

$factory->define(App\Episode::class, function(Faker\Generator $faker){
    return [
        'numero' => $faker->numberBetween(1, 40),
    ];
});

$factory->define(App\Film::class, function(Faker\Generator $faker){
    return [

    ];
});