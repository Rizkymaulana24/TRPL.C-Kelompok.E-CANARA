<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30);
            $table->string('password', 60);
            $table->string('nama_lengkap', 30)->nullable();
            $table->string('email', 30)->unique();
            $table->string('nomor_hp', 15)->nullable();
            $table->string('alamat', 30)->nullable();
            $table->string('kecamatan', 15)->nullable();
            $table->string('kota', 15)->nullable();
            $table->string('provinsi', 15)->nullable();
            $table->string('kodepos', 15)->nullable();
            $table->string('role', 15)->default('penyelenggara');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
