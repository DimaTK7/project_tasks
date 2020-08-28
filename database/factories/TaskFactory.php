<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\TasksStatus;
use App\Model\Managerial\Projects;
use App\Model\Managerial\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'status' => TasksStatus::getRandomValue()+1,
        'description' => $faker->sentence(15),
        'project_id' => function() {
            return factory(Projects::class)->create()->id;
        },
    ];
});
