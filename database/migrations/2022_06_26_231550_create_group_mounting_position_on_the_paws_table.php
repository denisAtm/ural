<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('group_mounting_position_on_the_paws', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('group_id')->default(2)->constrained('groups')->onDelete('cascade');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE group_mounting_position_on_the_paws comment 'Монтажное положение на лапах для мотор-редукторов'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_mounting_position_on_the_paws');
    }
};
