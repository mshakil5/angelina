<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run(): void
    {
        Section::truncate();

        $sections = [
            ['name' => 'Slider', 'sl' => 1, 'status' => 1],
            ['name' => 'About1', 'sl' => 2, 'status' => 1],
            ['name' => 'About2', 'sl' => 3, 'status' => 1],
            ['name' => 'Blog', 'sl' => 4, 'status' => 1],
            ['name' => 'Features', 'sl' => 5, 'status' => 1],
            ['name' => 'Services', 'sl' => 6, 'status' => 1],
            ['name' => 'Plans', 'sl' => 7, 'status' => 1],
            ['name' => 'Testimonial', 'sl' => 8, 'status' => 1],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}