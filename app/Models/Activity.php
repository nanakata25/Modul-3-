<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public const STATUSES = ['Draft', 'Published', 'Completed'];

    protected $fillable = [
        'code',
        'title',
        'description',
        'activity_date',
        'category_id',
        'category',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'activity_date' => 'date',
        ];
    }

    public function activityCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
