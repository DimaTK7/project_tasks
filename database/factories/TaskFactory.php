<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\TasksStatus;
use App\Model\Managerial\Projects;
use App\Model\Managerial\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'status' => TasksStatus::getRandomValue(),
        'description' => $faker->sentence(15),
        'project_id' => Projects::find(rand(1, 3))->id

    ];
});
