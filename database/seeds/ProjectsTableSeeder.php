<?php

use Illuminate\Database\Seeder;
use App\Model\Managerial\Projects;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Projects::class, 20)->create();
    }
}