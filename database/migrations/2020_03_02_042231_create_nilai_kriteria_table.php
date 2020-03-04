<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriteria', function (Blueprint $table) {
             $table->increments('id');
            $table->unsignedInteger('kriteria_id')->index()->nullable();
             $table->string('nama');
            $table->integer('nilai');
            $table->timestamps();
            $table->foreign('kriteria_id')
                    ->references('id')
                    ->on('kriteria')
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
        Schema::dropIfExists('nilai_kriteria');
    }
}
