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
            $table->string('client')->nullable();
            $table->string('company')->nullable();
            //$table->foreignId('state_id')->nullable();
            $table->string('state')->nullable();
            $table->string('coast')->nullable();
            $table->string('origin')->nullable(); //make a origin table category like state, and posibility to add origins
            $table->string('next_action')->nullable();
            $table->string('date_action')->nullable();
            $table->string('action_state')->nullable();
            $table->string('email')->nullable();
            $table->longText('phone')->nullable();
            $table->string('description')->nullable();

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
