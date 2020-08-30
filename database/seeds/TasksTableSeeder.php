<?php

use Illuminate\Database\Seeder;
use App\Model\Managerial\Tasks;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tasks::class, 60)->create();
    }
}
