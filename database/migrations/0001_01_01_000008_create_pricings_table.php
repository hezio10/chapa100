<?php

use App\Models\BusLine;
use App\Models\Route;
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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BusLine::class)->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignIdFor(TransportType::class)->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('currency', ['mzn'])->nullable();
            $table->dateTime('effective_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->enum('availability', ['available', 'unavailable'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
