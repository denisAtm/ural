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
        Schema::table('gear_motors', function (Blueprint $table) {
            $table->foreignId('output_shaft_id')->nullable()->constrained('shafts')->onDelete('cascade');
        });
        Schema::table('reducers', function (Blueprint $table) {
            $table->foreignId('output_shaft_id')->nullable()->constrained('shafts')->onDelete('cascade');
            $table->foreignId('front_shaft_id')->nullable()->constrained('shafts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reducers', function (Blueprint $table) {
            $table->dropColumn('output_shaft_id');
            $table->dropColumn('front_shaft_id');
        });
        Schema::table('gear_motors', function (Blueprint $table) {
            $table->dropColumn('output_shaft_id');

        });

        }
};
