<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('owner_name');
            $table->string('address');
            $table->string('aadhar');
            $table->string('aadhar_img');
            $table->string('gst');
            $table->string('agency_logo');
            $table->integer('commission');
            $table->integer('wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_details');
    }
}
