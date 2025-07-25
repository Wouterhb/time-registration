<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeEntry extends Model
{
    /** @use HasFactory<\Database\Factories\TimeEntryFactory> */
    use HasFactory;

        protected $fillable = [
        'project_id',
        'date',
        'start_time',
        'end_time',
        'description',
    ];

    protected $casts = [
    'date' => 'date',
    'start_time' => 'datetime',
    'end_time'   => 'datetime',
];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
