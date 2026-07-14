<?php

use App\Models\BusLine;
use App\Models\Location;
use App\Models\ServiceType;
use App\Models\TransportType;
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
        Schema::create('bus_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ServiceType::class)->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(Location::class, 'origin_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(Location::class, 'destination_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(TransportType::class, 'transport_type_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
        });

        Schema::create('busline_tranportypes', function (Blueprint $table) {
            $table->foreignIdFor(BusLine::class, 'busline_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(TransportType::class, 'transport_type_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_lines');
        Schema::dropIfExists('busline_tranportypes');
    }
};
