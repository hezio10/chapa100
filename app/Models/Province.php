<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class Province extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
