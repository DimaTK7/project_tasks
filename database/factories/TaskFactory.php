<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\TasksStatus;
use App\Model\Admin\Project;
use App\Model\Admin\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'status' => TasksStatus::getRandomValue(),
        'description' => $faker->sentence(15),
        'project_id' => Project::find(rand(1, 3))->id

    ];
});
