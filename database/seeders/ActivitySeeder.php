<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['code' => 'ACT-001', 'title' => 'Workshop Git Dasar', 'description' => 'Latihan kolaborasi repository.', 'activity_date' => '2026-10-05', 'category' => 'workshop', 'status' => 'Draft'],
            ['code' => 'ACT-002', 'title' => 'Seminar Web Quality', 'description' => 'Pengenalan maintainability dan testing.', 'activity_date' => '2026-10-12', 'category' => 'seminar', 'status' => 'Published'],
            ['code' => 'ACT-003', 'title' => 'Praktikum Laravel', 'description' => 'Latihan framework Laravel dasar.', 'activity_date' => '2026-10-15', 'category' => 'praktikum', 'status' => 'Published'],
            ['code' => 'ACT-004', 'title' => 'Presentasi Proyek', 'description' => 'Presentasi hasil pengembangan aplikasi.', 'activity_date' => '2026-10-20', 'category' => 'presentasi', 'status' => 'Completed'],
            ['code' => 'ACT-005', 'title' => 'Evaluasi Aplikasi', 'description' => 'Evaluasi dan pengecekan hasil aplikasi.', 'activity_date' => '2026-10-25', 'category' => 'evaluasi', 'status' => 'Draft'],
        ];

        foreach ($activities as $attributes) {
            $category = Category::where('slug', $attributes['category'])->firstOrFail();
            unset($attributes['category']);
            $attributes['category'] = $category->name;

            Activity::updateOrCreate(
                ['code' => $attributes['code']],
                [...$attributes, 'category_id' => $category->id],
            );
        }
    }
}
