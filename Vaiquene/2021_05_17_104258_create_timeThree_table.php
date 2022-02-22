<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeThreeTable extends Migration
{

    public function up()
    {
        Schema::create('timesThree', function (Blueprint $table) {
            $table->id();
            $table->string('shopId');
            $table->string('workerId');
            $table->string('date');

            //-----------------------
            $table->string('t08h00');
            $table->string('t08h10');
            $table->string('t08h20');
            $table->string('t08h30');
            $table->string('t08h40');
            $table->string('t08h50');            
            //-----------------------
            $table->string('t09h00');
            $table->string('t09h10');
            $table->string('t09h20');
            $table->string('t09h30');
            $table->string('t09h40');
            $table->string('t09h50');
            //-----------------------
            $table->string('t10h00');
            $table->string('t10h10');
            $table->string('t10h20');
            $table->string('t10h30');
            $table->string('t10h40');
            $table->string('t10h50');
            //-----------------------
            $table->string('t11h00');
            $table->string('t11h10');
            $table->string('t11h20');
            $table->string('t11h30');
            $table->string('t11h40');
            $table->string('t11h50');            
            //-----------------------
            $table->string('t12h00');
            $table->string('t12h10');
            $table->string('t12h20');
            $table->string('t12h30');
            $table->string('t12h40');
            $table->string('t12h50');
            //-----------------------
            $table->string('t13h00');
            $table->string('t13h10');
            $table->string('t13h20');
            $table->string('t13h30');
            $table->string('t13h40');
            $table->string('t13h50');
            //-----------------------
            $table->string('t14h00');
            $table->string('t14h10');
            $table->string('t14h20');
            $table->string('t14h30');
            $table->string('t14h40');
            $table->string('t14h50');
            //-----------------------
            $table->string('t15h00');
            $table->string('t15h10');
            $table->string('t15h20');
            $table->string('t15h30');
            $table->string('t15h40');
            $table->string('t15h50');
            //-----------------------
            
            
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
        Schema::dropIfExists('timesThree');
    }
}
