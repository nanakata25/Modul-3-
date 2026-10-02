<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'title' => 'Workshop Git Dasar',
            'description' => 'Latihan kolaborasi repository.',
            'activity_date' => '2026-10-05',
            'category' => 'Workshop',
            'status' => 'Planned',
        ]);

        Activity::create([
            'title' => 'Seminar Web Quality',
            'description' => 'Pengenalan maintainability dan testing.',
            'activity_date' => '2026-10-12',
            'category' => 'Seminar',
            'status' => 'Planned',
        ]);

        Activity::create([
            'title' => 'Praktikum Laravel',
            'description' => 'Latihan framework Laravel dasar.',
            'activity_date' => '2026-10-15',
            'category' => 'Praktikum',
            'status' => 'Ongoing',
        ]);

        Activity::create([
            'title' => 'Presentasi Proyek',
            'description' => 'Presentasi hasil pengembangan aplikasi.',
            'activity_date' => '2026-10-20',
            'category' => 'Presentasi',
            'status' => 'Done',
        ]);

        Activity::create([
            'title' => 'Evaluasi Aplikasi',
            'description' => 'Evaluasi dan pengecekan hasil aplikasi.',
            'activity_date' => '2026-10-25',
            'category' => 'Evaluasi',
            'status' => 'Ongoing',
        ]);
    }
}