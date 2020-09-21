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
        'project_id' => Project::find(2)->id

    ];
});
