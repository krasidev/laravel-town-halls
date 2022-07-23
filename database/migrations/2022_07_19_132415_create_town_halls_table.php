<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('town_halls', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation', 16)->unique();
            $table->string('ekatte_num', 8)->unique();
            $table->string('name', 32)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('town_halls');
    }
}
