<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_id');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('status')->comment("0=DEACTIVE,1=ACTIVE");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('agent_register');
    }
}
