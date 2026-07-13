<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'capacity'])]
class TransportType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pricings(): HasMany
    {
        return $this->hasMany(BusLine::class);
    }
}
