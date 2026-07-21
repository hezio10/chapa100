<?php

use App\Models\BusLine;
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
        Schema::create('most_popular_buslines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BusLine::class)->constrained()->onUpdate('restrict')->onDelete('restrict')->unique();
            $table->unsignedInteger('total')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('most_popular_buslines');
    }
};
