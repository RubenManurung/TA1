<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskmDimPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('askm_dim_penilaian', function (Blueprint $table) {
            $table->integer('dim_id');
            $table->integer('ta')->nullable();
            $table->integer('sem_ta')->nullable();
            $table->integer('akumulasi_skor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('askm_dim_penilaian');
    }
}
