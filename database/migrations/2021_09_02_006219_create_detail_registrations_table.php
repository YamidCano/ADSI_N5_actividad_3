<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_registro')->nullable();
            $table->foreign('id_registro')->references('id')->on('registrations');
            $table->unsignedBigInteger('id_aprendiz')->nullable();
            $table->foreign('id_aprendiz')->references('id')->on('apprentices');
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
        Schema::dropIfExists('detail_registrations');
    }
}
