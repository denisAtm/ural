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
        Schema::create('gear_ratio_reducer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gear_ratio_id')->nullable()->constrained('gear_ratio')->onDelete('cascade');
            $table->foreignId('reducer_id')->nullable()->constrained('reducers')->onDelete('cascade');
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
        Schema::dropIfExists('gear_ratio_reducer');
    }
};
