<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'type', 'province_id'])]
class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function originRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'origin_id');
    }

    public function destinationRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'destination_id');
    }
}
