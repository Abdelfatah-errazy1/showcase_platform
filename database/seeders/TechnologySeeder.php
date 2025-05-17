<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $technologies = [
            'PHP',
            'Laravel',
            'MySQL',
            'HTML5',
            'CSS3',
            'JavaScript',
            'Bootstrap 5',
            'jQuery',
            'AJAX',
            'Blade',
            'Metronic',
            'FontAwesome',
            'Dropzone',
            'SweetAlert',
            'Chart.js',
            'WYSIWYG Editor',
            'Laravel Breeze',
            'Sanctum',
            'GitHub',
        ];

        foreach ($technologies as $tech) {
            Technology::create(['name' => $tech, 'slug' => Str::slug($tech)]);
        }
    }
}
