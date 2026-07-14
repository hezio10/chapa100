<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'capacity'])]
class TransportType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pricings(): BelongsToMany
    {
        return $this->belongsToMany(BusLine::class, 'busline_trasport_types');
    }
}
