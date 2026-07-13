<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['service_type_id', 'origin_id', 'destination_id'])]
class BusLine extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'origin_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'destination_id');
    }

    public function transportType(): BelongsTo
    {
        return $this->belongsTo(TransportType::class);
    }
    
    public function pricings(): HasMany
    {
        return $this->hasMany(Pricing::class);
    }
}
