<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output_shaft_motor_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shaft_id')->constrained('shafts')->onDelete('cascade');
            $table->foreignId('series_id')->constrained('motor_series')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('output_shaft_motor_series');
    }
};
