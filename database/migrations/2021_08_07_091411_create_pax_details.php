<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaxDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pax_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('paxtype')->comment('0=INFANT,1=CHILD,2=ADULT');
            $table->string('gender')->comment('0=MALE,1=FEMALE');
            $table->string('dob');
            $table->string('passport');
            $table->string('expiry');
            $table->string('status')->comment('0=BLOCKED,1=ACTIVE');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pax_details');
    }
}
