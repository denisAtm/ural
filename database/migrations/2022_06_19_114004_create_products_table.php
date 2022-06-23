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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('type_of_transmission');
            $table->string('number_of_transfer_stages');
            $table->string('gear_ratio');
            $table->string('location_of_axes');
            $table->string('climatic_version');
            $table->string('build_option');
            $table->string('state_standard');
            $table->longText('desc');
            $table->longText('size');
            $table->string('slug')->unique();
            $table->foreignId('status_id')->default(1)->constrained('news_statuses');
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
        Schema::dropIfExists('products');
    }
};
