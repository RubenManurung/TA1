<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdakRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adak_registrasi', function (Blueprint $table) {
            $table->integer('dim_id');
            $table->integer('ta')->nullable();
            $table->integer('sem_ta')->nullable();
            $table->float('nr')->nullable();
            $table->string('status_akhir_registrasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adak_registrasi');
    }
}
