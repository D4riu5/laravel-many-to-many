<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Technology;

// Helpers


class Project_technologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $projects = Project::all();
        $technologies = Technology::all();
        $techCount = $technologies->count();

        if ($techCount > 0) {
            foreach ($projects as $project) {
                $techIds = $technologies->random(1, $techCount )->pluck('id')->toArray();
                $project->technologies()->syncWithoutDetaching($techIds);
            }
        }
    }
}
