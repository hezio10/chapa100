<?php

use App\Models\Location;
use App\Models\ServiceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ServiceType::class)->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(Location::class, 'origin_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(Location::class, 'destination_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
