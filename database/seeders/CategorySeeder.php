<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['name' => 'Workshop', 'slug' => 'workshop'],
            ['name' => 'Seminar', 'slug' => 'seminar'],
            ['name' => 'Praktikum', 'slug' => 'praktikum'],
            ['name' => 'Presentasi', 'slug' => 'presentasi'],
            ['name' => 'Evaluasi', 'slug' => 'evaluasi'],
        ] as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
