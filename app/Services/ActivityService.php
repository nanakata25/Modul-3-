<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    private const ALLOWED_TRANSITIONS = [
        'Planned' => ['Planned', 'Ongoing'],
        'Ongoing' => ['Ongoing', 'Done'],
        'Done' => ['Done'],
    ];

    public function create(array $attributes): Activity
    {
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

        $activity->update($attributes);

        return $activity;
    }
}
