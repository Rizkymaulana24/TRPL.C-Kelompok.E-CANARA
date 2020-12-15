<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyelenggarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyelenggaras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap', 40)->nullable();
            $table->string('email', 40)->unique();
            $table->string('username', 40);
            $table->string('password', 60);
            $table->mediumText('logo_penyelenggara')->nullable();
            $table->string('nomor_hp', 20)->nullable();
            $table->string('nomor_wa', 20)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kecamatan', 20)->nullable();
            $table->string('kota', 20)->nullable();
            $table->string('provinsi', 20)->nullable();
            $table->string('kodepos', 10)->nullable();
            $table->mediumText('scan_strukturkepengurusan')->nullable();
            $table->string('nama_penanggungjawab', 40)->nullable();
            $table->string('jabatan_penanggungjawab', 30)->nullable();
            $table->mediumText('scan_identitaspenanggungjawab')->nullable();
            $table->string('jenis_identitaspenanggungjawab')->nullable();
            $table->mediumText('scan_buktitransfer')->nullable();
            $table->string('persetujuan_syarat_ketentuan')->nullable();
            $table->string('role', 30)->default('penyelenggara');
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
        Schema::dropIfExists('penyelenggaras');
    }
}
