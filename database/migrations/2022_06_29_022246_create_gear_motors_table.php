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
        Schema::create('gear_motors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('series_id')->constrained('motor_series')->onDelete('cascade');
            $table->foreignId('number_of_transfer_stages_id')->nullable()->constrained('number_of_transfer_stages')->onDelete('cascade');
            $table->foreignId('location_of_axes_id')->nullable()->constrained('location_of_axes')->onDelete('cascade');
            $table->longText('desc')->nullable();
            $table->longText('size')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('gear_motors');
    }
};
