<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    private const ALLOWED_TRANSITIONS = [
        'Draft' => ['Draft', 'Published'],
        'Published' => ['Published', 'Completed'],
        'Completed' => ['Completed'],
    ];

    public function create(array $attributes): Activity
    {
        $attributes['category'] = Category::findOrFail($attributes['category_id'])->name;
        $attributes['status'] = 'Draft';

        return Activity::create($attributes);
    }

    public function update(Activity $activity, array $attributes): Activity
    {
        $nextStatus = $attributes['status'];

        if (! in_array($nextStatus, self::ALLOWED_TRANSITIONS[$activity->status] ?? [], true)) {
            throw ValidationException::withMessages([
                'status' => "Transisi status dari {$activity->status} ke {$nextStatus} tidak diizinkan.",
            ]);
        }

        if ($nextStatus === 'Published' && blank($attributes['description'])) {
            throw ValidationException::withMessages([
                'description' => 'Deskripsi wajib diisi sebelum kegiatan dapat dipublikasikan.',
            ]);
        }

        $attributes['category'] = Category::findOrFail($attributes['category_id'])->name;
        $activity->update($attributes);

        return $activity;
    }
}
