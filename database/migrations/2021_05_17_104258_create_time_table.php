<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTable extends Migration
{

    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('shopId');
            $table->string('workerId');
            $table->string('date');
            
            //------------------------
            $table->boolean('t00h00');
            $table->boolean('t00h10');
            $table->boolean('t00h20');
            $table->boolean('t00h30');
            $table->boolean('t00h40');
            $table->boolean('t00h50');
            //-----------------------
            $table->boolean('t01h00');
            $table->boolean('t01h10');
            $table->boolean('t01h20');
            $table->boolean('t01h30');
            $table->boolean('t01h40');
            $table->boolean('t01h50');
            //-----------------------
            $table->boolean('t02h00');
            $table->boolean('t02h10');
            $table->boolean('t02h20');
            $table->boolean('t02h30');
            $table->boolean('t02h40');
            $table->boolean('t02h50');
            //-----------------------
            $table->boolean('t03h00');
            $table->boolean('t03h10');
            $table->boolean('t03h20');
            $table->boolean('t03h30');
            $table->boolean('t03h40');
            $table->boolean('t03h50');
            //-----------------------
            $table->boolean('t04h00');
            $table->boolean('t04h10');
            $table->boolean('t04h20');
            $table->boolean('t04h30');
            $table->boolean('t04h40');
            $table->boolean('t04h50');
            //-----------------------
            $table->boolean('t05h00');
            $table->boolean('t05h10');
            $table->boolean('t05h20');
            $table->boolean('t05h30');
            $table->boolean('t05h40');
            $table->boolean('t05h50');
            //-----------------------
            $table->boolean('t06h00');
            $table->boolean('t06h10');
            $table->boolean('t06h20');
            $table->boolean('t06h30');
            $table->boolean('t06h40');
            $table->boolean('t06h50');
            //-----------------------
            $table->boolean('t07h00');
            $table->boolean('t07h10');
            $table->boolean('t07h20');
            $table->boolean('t07h30');
            $table->boolean('t07h40');
            $table->boolean('t07h50');
            //-----------------------
            $table->boolean('t08h00');
            $table->boolean('t08h10');
            $table->boolean('t08h20');
            $table->boolean('t08h30');
            $table->boolean('t08h40');
            $table->boolean('t08h50');            
            //-----------------------
            $table->boolean('t09h00');
            $table->boolean('t09h10');
            $table->boolean('t09h20');
            $table->boolean('t09h30');
            $table->boolean('t09h40');
            $table->boolean('t09h50');
            //-----------------------
            $table->boolean('t10h00');
            $table->boolean('t10h10');
            $table->boolean('t10h20');
            $table->boolean('t10h30');
            $table->boolean('t10h40');
            $table->boolean('t10h50');
            //-----------------------
            $table->boolean('t11h00');
            $table->boolean('t11h10');
            $table->boolean('t11h20');
            $table->boolean('t11h30');
            $table->boolean('t11h40');
            $table->boolean('t11h50');            
            //-----------------------
            $table->boolean('t12h00');
            $table->boolean('t12h10');
            $table->boolean('t12h20');
            $table->boolean('t12h30');
            $table->boolean('t12h40');
            $table->boolean('t12h50');
            //-----------------------
            $table->boolean('t13h00');
            $table->boolean('t13h10');
            $table->boolean('t13h20');
            $table->boolean('t13h30');
            $table->boolean('t13h40');
            $table->boolean('t13h50');
            //-----------------------
            $table->boolean('t14h00');
            $table->boolean('t14h10');
            $table->boolean('t14h20');
            $table->boolean('t14h30');
            $table->boolean('t14h40');
            $table->boolean('t14h50');
            //-----------------------
            $table->boolean('t15h00');
            $table->boolean('t15h10');
            $table->boolean('t15h20');
            $table->boolean('t15h30');
            $table->boolean('t15h40');
            $table->boolean('t15h50');
            //-----------------------
            $table->boolean('t16h00');
            $table->boolean('t16h10');
            $table->boolean('t16h20');
            $table->boolean('t16h30');
            $table->boolean('t16h40');
            $table->boolean('t16h50');
            //-----------------------
            $table->boolean('t17h00');
            $table->boolean('t17h10');
            $table->boolean('t17h20');
            $table->boolean('t17h30');
            $table->boolean('t17h40');
            $table->boolean('t17h50');
            //-----------------------
            $table->boolean('t18h00');
            $table->boolean('t18h10');
            $table->boolean('t18h20');
            $table->boolean('t18h30');
            $table->boolean('t18h40');
            $table->boolean('t18h50');
            //-----------------------
            $table->boolean('t19h00');
            $table->boolean('t19h10');
            $table->boolean('t19h20');
            $table->boolean('t19h30');
            $table->boolean('t19h40');
            $table->boolean('t19h50');
            //-----------------------
            $table->boolean('t20h00');
            $table->boolean('t20h10');
            $table->boolean('t20h20');
            $table->boolean('t20h30');
            $table->boolean('t20h40');
            $table->boolean('t20h50');
            //-----------------------
            $table->boolean('t21h00');
            $table->boolean('t21h10');
            $table->boolean('t21h20');
            $table->boolean('t21h30');
            $table->boolean('t21h40');
            $table->boolean('t21h50');
            //-----------------------
            $table->boolean('t22h00');
            $table->boolean('t22h10');
            $table->boolean('t22h20');
            $table->boolean('t22h30');
            $table->boolean('t22h40');
            $table->boolean('t22h50');
            //-----------------------
            $table->boolean('t23h00');
            $table->boolean('t23h10');
            $table->boolean('t23h20');
            $table->boolean('t23h30');
            $table->boolean('t23h40');
            $table->boolean('t23h50');


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
        Schema::dropIfExists('times');
    }
}
