<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alternatif_id')->index()->nullable();
            $table->unsignedInteger('nilai_kriteria_id')->index()->nullable();
//            $table->timestamps();
            $table->foreign('alternatif_id')
                ->references('id')
                ->on('mahasiswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('nilai_kriteria_id')
                ->references('id')
                ->on('nilai_kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternatif');
    }
}
