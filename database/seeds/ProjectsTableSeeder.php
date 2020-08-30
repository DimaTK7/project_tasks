<?php

use Illuminate\Database\Seeder;
use App\Model\Managerial\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 3)->create();
    }
}
