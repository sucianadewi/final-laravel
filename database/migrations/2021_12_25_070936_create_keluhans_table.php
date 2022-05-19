<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan', function (Blueprint $table) {
            $table->bigIncrements('id_keluhan');
            $table->bigInteger('id_servis')->unsigned();
            $table->date('tgl_keluhan');
            $table->string('no_keluhan', 20);
            $table->string('nama', 50);
            $table->string('no_tlp', 20);
            $table->text('pengaduan');
            $table->string('bukti', 195);
            $table->enum('status', ['Open', 'Close'])->default('Open');
            $table->timestamps();

            $table->foreign('id_servis')->references('id_servis')->on('servis')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluhan');
    }
}
