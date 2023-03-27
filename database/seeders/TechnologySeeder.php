<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            'Html',
            'Css',
            'Sass',
            'Vue',
            'Vite',
            'Bootstrap',
            'Javascript',
            'Git',
            'Php',
            'Laravel',
            'mySQL',
            'Photoshop',
            'Paint'
        ];

        foreach ($technologies as $technology) {
            $newTechnology = Technology::create([
                'name' => $technology,
                'slug' => Str::slug($technology),
            ]);
        }
    }
}
