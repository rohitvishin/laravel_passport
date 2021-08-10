<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('appReference');
            $table->string('transaction_id');
            $table->string('amount');
            $table->text('hotel_response');
            $table->text('hotel_data');
            $table->text('pax_data');
            $table->timestamp('created_date');
            $table->boolean('date')->default(0);
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
        Schema::dropIfExists('hotel_booking');
    }
}
