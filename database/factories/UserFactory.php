<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\User;
use App\Model\Permission;
use App\Model\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $active = $faker->boolean;

    $developer = Role::where('slug','web-developer')->first();
    $manager = Role::where('slug', 'project-manager')->first();
    $createTasks = Permission::where('slug','create-tasks')->first();
    $manageUsers = Permission::where('slug','manage-users')->first();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verify_token' => $active ? null : Str::uuid(),
        'status' => $active ? User::STATUS_ACTIVE : User::STATUS_WAIT,
    ];

        $user1 = new User();
        $user1->name = $faker->name;
        $user1->email = $faker->unique()->safeEmail;
        $user1->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user1->email_verified_at = now();
        $user1->remember_token = Str::random(10);
        $user1->verify_token = $active ? null : Str::uuid();
        $user1->status = $active ? User::STATUS_ACTIVE : User::STATUS_WAIT;
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = $faker->name;
        $user2->email = $faker->unique()->safeEmail;
        $user2->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user2->email_verified_at = now();
        $user2->remember_token = Str::random(10);
        $user2->verify_token = $active ? null : Str::uuid();
        $user2->status = $active ? User::STATUS_ACTIVE : User::STATUS_WAIT;
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);

});
