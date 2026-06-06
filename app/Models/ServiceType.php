<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'descrtiption'])]
class ServiceType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }
}
