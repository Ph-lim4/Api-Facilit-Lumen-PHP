<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTwoTable extends Migration
{

    public function up()
    {
        Schema::create('timesTwo', function (Blueprint $table) {
            $table->id();
            $table->string('shopId');
            $table->string('workerId');
            $table->string('date');

            $table->string('t16h00');
            $table->string('t16h10');
            $table->string('t16h20');
            $table->string('t16h30');
            $table->string('t16h40');
            $table->string('t16h50');
            //-----------------------
            $table->string('t17h00');
            $table->string('t17h10');
            $table->string('t17h20');
            $table->string('t17h30');
            $table->string('t17h40');
            $table->string('t17h50');
            //-----------------------
            $table->string('t18h00');
            $table->string('t18h10');
            $table->string('t18h20');
            $table->string('t18h30');
            $table->string('t18h40');
            $table->string('t18h50');
            //-----------------------
            $table->string('t19h00');
            $table->string('t19h10');
            $table->string('t19h20');
            $table->string('t19h30');
            $table->string('t19h40');
            $table->string('t19h50');
            //-----------------------
            $table->string('t20h00');
            $table->string('t20h10');
            $table->string('t20h20');
            $table->string('t20h30');
            $table->string('t20h40');
            $table->string('t20h50');
            //-----------------------
            $table->string('t21h00');
            $table->string('t21h10');
            $table->string('t21h20');
            $table->string('t21h30');
            $table->string('t21h40');
            $table->string('t21h50');
            //-----------------------
            $table->string('t22h00');
            $table->string('t22h10');
            $table->string('t22h20');
            $table->string('t22h30');
            $table->string('t22h40');
            $table->string('t22h50');
            //-----------------------
            $table->string('t23h00');
            $table->string('t23h10');
            $table->string('t23h20');
            $table->string('t23h30');
            $table->string('t23h40');
            $table->string('t23h50');
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
        Schema::dropIfExists('timesTwo');
    }
}
