<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_monitor')->nullable();
            $table->foreign('id_monitor')->references('id')->on('apprentices');
            $table->unsignedBigInteger('id_ficha')->nullable();
            $table->foreign('id_ficha')->references('id')->on('fichas');
            $table->string('ficha')->nullable();
            $table->unsignedBigInteger('id_instructor')->nullable();
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->date('date')->nullable();
            $table->unsignedBigInteger('id_jornada')->nullable();
            $table->foreign('id_jornada')->references('id')->on('working_days');
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
        Schema::dropIfExists('registrations');
    }
}
