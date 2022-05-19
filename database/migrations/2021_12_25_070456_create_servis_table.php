<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->bigIncrements('id_servis');
            $table->bigInteger('id_user')->unsigned();
            $table->date('tgl_servis');
            $table->string('nama_pemilik', 50);
            $table->string('no_tlp', 20);
            $table->string('no_polisi', 10);
            $table->string('no_nota', 20);
            $table->string('tipe_motor', 20);
            $table->string('mekanik', 50);
            $table->text('keterangan');
            $table->integer('total_biaya')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servis');
    }
}
