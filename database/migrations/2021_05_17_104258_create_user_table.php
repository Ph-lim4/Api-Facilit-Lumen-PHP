<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('name',40);
            $table->string('phone');
            $table->string('gender');
            $table->string('email');
            $table->string('password');
            $table->string('photo_profile');
            $table->timestamps();
        });
    }

// name (foreign key service)
// date
// hour
// price 
// status
// shopName
// contractsServices (array)
// duration
// bossId (foreign key boss)
// userId (foreign key User)
// serviceId (array)
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
