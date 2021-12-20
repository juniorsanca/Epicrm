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
            $table->string('client');
            $table->string('company');
            $table->string('coast');
            $table->string('origin');
            $table->string('email');
            $table->string('phone');
            $table->string('description');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('users');
            $table->foreignId('user_id')->nullable();

            $table->foreignId('state_id')->nullable();

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
