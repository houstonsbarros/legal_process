<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Judge extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function process(): HasMany
    {
        return $this->hasMany(Process::class);
    }
}
