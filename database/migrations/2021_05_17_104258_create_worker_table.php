<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('shopId');
            $table->string('openingTimeOne');
            $table->string('closingTimeOne');
            $table->string('openingTimeTwo');
            $table->string('closingTimeTwo');
            $table->string('photo_profile');
            $table->timestamps();
        });
    }

//name
// shopId
// openingTimeOne 
// closingTimeOne
// openingTimeTwo
// closingTimeTwo
// photo_profile
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
