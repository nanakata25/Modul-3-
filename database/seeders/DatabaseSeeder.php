<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ([
            ['title' => 'Menyelesaikan laporan praktikum', 'description' => 'Merapikan hasil dan dokumentasi praktikum.', 'activity_date' => '2026-09-21', 'status' => 'Done'],
            ['title' => 'Membaca materi Laravel', 'description' => 'Mempelajari routing, controller, dan Blade.', 'activity_date' => '2026-09-22', 'status' => 'Done'],
            ['title' => 'Membuat fitur activity manager', 'description' => 'Menyelesaikan CRUD dan validasi kegiatan.', 'activity_date' => '2026-09-25', 'status' => 'Ongoing'],
            ['title' => 'Meninjau ulang acceptance criteria', 'description' => 'Memeriksa skenario uji modul.', 'activity_date' => '2026-09-26', 'status' => 'Planned'],
            ['title' => 'Mengumpulkan worksheet modul', 'description' => 'Melengkapi bukti dan refleksi praktikum.', 'activity_date' => '2026-09-28', 'status' => 'Planned'],
        ] as $activity) {
            Activity::updateOrCreate(['title' => $activity['title']], $activity);
        }
    }
}
