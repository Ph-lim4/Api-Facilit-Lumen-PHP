<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('date');
            $table->string('hour');
            $table->string('price');
            $table->string('status');
            $table->string('shopName');
            $table->string('contractsServices');
            $table->string('duration');
            $table->string('shopId');
            $table->string('userId');
            $table->string('serviceId');
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
// shopId (foreign key boss)
// userId (foreign key User)
// serviceId (array)
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Schedules');
    }
}
