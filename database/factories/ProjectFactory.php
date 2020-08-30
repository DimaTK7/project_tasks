<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Managerial\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
