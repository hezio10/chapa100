<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['route_id', 'transport_type_id', 'price', 'currency', 'effective_date', 'end_date', 'availability'])]
class Pricing extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'effective_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    public function busline(): BelongsTo
    {
        return $this->belongsTo(BusLine::class);
    }
}
