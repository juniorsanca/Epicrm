<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {

            $table->id();
            $table->string('date');
            $table->string('client');
            $table->string('company');
            $table->foreignId('state_id')->nullable();
            $table->string('coast');
            $table->string('origin'); //make a origin table category like state, and posibility to add origins
            $table->string('next_action');
            $table->string('action_state');
            $table->string('email');
            $table->string('phone');
            $table->string('description');

            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('users');
            $table->foreignId('user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
