<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakLanjutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindak_lanjut', function (Blueprint $table) {
            $table->bigIncrements('id_tindak_lanjut');
            $table->bigInteger('id_keluhan')->unsigned();
            $table->date('tgl_penanganan');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_keluhan')->references('id_keluhan')->on('keluhan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tindak_lanjut');
    }
}
