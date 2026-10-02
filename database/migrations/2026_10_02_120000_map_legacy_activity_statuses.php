<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const STATUS_MAP = [
        'Planned' => 'Draft',
        'Ongoing' => 'Published',
        'Done' => 'Completed',
    ];

    public function up(): void
    {
        foreach (self::STATUS_MAP as $oldStatus => $newStatus) {
            DB::table('activities')->where('status', $oldStatus)->update(['status' => $newStatus]);
        }
    }

    public function down(): void
    {
        foreach (array_flip(self::STATUS_MAP) as $newStatus => $oldStatus) {
            DB::table('activities')->where('status', $newStatus)->update(['status' => $oldStatus]);
        }
    }
};
