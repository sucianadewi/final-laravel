<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_servis', function (Blueprint $table) {
            $table->bigIncrements('id_detail_servis');
            $table->bigInteger('id_servis')->unsigned();
            $table->bigInteger('id_jasa_barang')->unsigned();
            $table->string('nama', 40);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('sub_total');
            $table->timestamps();

            $table->foreign('id_servis')->references('id_servis')->on('servis')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_jasa_barang')->references('id_jasa_barang')->on('jasa_barang')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_servis');
    }
}
