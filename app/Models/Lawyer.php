<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lawyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'oab',
        'uf_oab',
        'phone'
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
