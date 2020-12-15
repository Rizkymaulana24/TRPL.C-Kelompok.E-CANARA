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
            $table->string('nama_lengkap', 40)->nullable();
            $table->string('email', 40)->unique();
            $table->string('username', 40);
            $table->string('password', 60);
            $table->string('nomor_hp', 20)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kecamatan', 20)->nullable();
            $table->string('kota', 20)->nullable();
            $table->string('provinsi', 20)->nullable();
            $table->string('kodepos', 10)->nullable();
            $table->string('role', 30)->default('admin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // protected $jenis_identitas = [
    //     'ktp',
    //     'sim',
    //     'passport',
    //     'npwp',

    // ];

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
