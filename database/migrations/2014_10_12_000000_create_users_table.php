<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('nama', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 195);
            $table->string('no_tlp', 20);
            $table->text('alamat');
            $table->string('foto', 195)->nullable();
            $table->enum('role', ['Admin', 'Petugas'])->nullable();
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
            $table->timestamps();
            // $table->rememberToken();
            // $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
