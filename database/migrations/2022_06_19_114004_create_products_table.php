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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->boolean('gost');
            $table->foreignId('number_of_transfer_stages')->constrained('number_of_transfer_stages')->onDelete('cascade');
            $table->foreignId('location_of_axes')->constrained('location_of_axes')->onDelete('cascade');
            $table->foreignId('series_id')->constrained('series')->onDelete('cascade');
            $table->string('climatic_version');
            $table->longText('desc');
            $table->longText('size');
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
