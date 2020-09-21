<?php

use App\Model\Admin\User;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('slug','web-developer')->first();
        $manager = Role::where('slug', 'project-manager')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();

        $user1 = new User();
        $user1->name = 'tyuiiiityuityui';
        $user1->email = 'gkghjkghjiiik@gsdfgdfg';
        $user1->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user1->email_verified_at = now();
        $user1->remember_token = Str::random(10);
        $user1->verify_token = Str::uuid();
        $user1->status = User::STATUS_WAIT;
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'tyuiiiitydsgdg555uityui';
        $user2->email = 'iii@gsdfgdfg';
        $user2->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user2->email_verified_at = now();
        $user2->remember_token = Str::random(10);
        $user2->verify_token = Str::uuid();
        $user2->status = User::STATUS_WAIT;
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);
    }
}
