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
        Schema::table('reducers', function (Blueprint $table) {
            $table->double('gearRatioStart')->after('torque')->nullable();
            $table->double('gearRatioEnd')->after('gearRatioStart')->nullable();
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
            $table->dropColumn('gearRatioStart');
            $table->dropColumn('gearRatioEnd');
        });
    }
};
