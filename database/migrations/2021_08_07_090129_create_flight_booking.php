<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('appReference');
            $table->string('transaction_id');
            $table->string('amount');
            $table->string('flight_response');
            $table->string('departure');
            $table->string('arrival');
            $table->dateTime('date');
            $table->dateTime('status')->comment("0=HOLD,1=CONFIRM,2=CANCEL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_booking');
    }
}
