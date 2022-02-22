<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('boss');
            $table->string('cpf');
            $table->string('cnpj');
            $table->string('name');
            $table->string('shopName');
            $table->string('gender');
            $table->string('phone');
            $table->string('password');
            $table->string('email');
            $table->string('street');
            $table->string('number');
            $table->string('district');
            $table->string('city');
            $table->string('cep');
            $table->string('state');
            $table->string('openingTimeOne');
            $table->string('closingTimeOne');
            $table->string('openingTimeTwo');
            $table->string('closingTimeTwo');
            $table->string('photo_profile');
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
        Schema::dropIfExists('shops');
    }
}
