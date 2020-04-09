<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimxDimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimx_dim', function (Blueprint $table) {
            $table->bigIncrements('dim_id')->unsigned();
            $table->string('nim')->nullable();
            $table->string('nama')->nullable();
            $table->integer('thn_masuk')->nullable();
            $table->integer('dari_jlh_anak')->nullable();
            $table->integer('penghasilan_ayah')->nullable();
            $table->integer('penghasilan_ayah_id')->nullable();
            $table->integer('penghasilan_ibu')->nullable();
            $table->integer('penghasilan_ibu_id')->nullable();
            $table->integer('pekerjaan_ayah_id')->nullable();
            $table->text('keterangan_pekerjaan_ayah')->nullable();
            $table->integer('pekerjaan_ibu_id')->nullable();
            $table->text('keterangan_pekerjaan_ibu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dimx_dim');
    }
}
