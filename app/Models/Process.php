<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Process extends Model
{
    use HasFactory;
    protected $fillable = [
        'protocol',
        'title',
        'description',
        'location',
        'type',
        'status'
    ];

    public function judge(): BelongsTo
    {
        return $this->belongsTo(Judge::class);
    }

    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(Lawyer::class);
    }
}
