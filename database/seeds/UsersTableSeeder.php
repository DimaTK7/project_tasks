<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
     //   factory(User::class, 5)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'root@root.ua',
            'email_verified_at' => now(),
            'password' => bcrypt('passadmin'),
            'remember_token' => Str::random(10),
        ]);
    }
}
