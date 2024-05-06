<?php

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
        Schema::create('Historis', function (Blueprint $table) {
            $table->id();
            $table->datetime('time');
            $table->float('Temperature');
            $table->float('Humidity');
            $table->float('CO2');
            $table->float('PM2,5');
            $table->float('Wspeed');
            $table->float('Wdirection');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Historis');
    }
};
