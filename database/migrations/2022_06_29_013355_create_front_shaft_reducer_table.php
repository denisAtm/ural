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
        Schema::create('front_shaft_reducer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shaft_id')->constrained('shafts')->onDelete('cascade');
            $table->foreignId('reducer_id')->constrained('reducers')->onDelete('cascade');
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
        Schema::dropIfExists('front_shaft_reducer');
    }
};
