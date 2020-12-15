<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namakegiatan', 100);
            $table->date('tanggalpelaksanaan'); 
            $table->time('waktu_pelaksanaan')->nullable();
            $table->string('alamatkegiatan', 100)->nullable();
            $table->string('alamatkegiatan', 100)->nullable();
            $table->string('kategori', 100)->nullable();
            $table->string('tingkat', 100)->nullable();
            $table->string('deskripsi', 2048);
            $table->mediumtext('scan_proposalkegiatan')->nullable();
            $table->string('nama_penanggungjawab', 40)->nullable();
            $table->string('jabatan_penanggungjawab', 30)->nullable();
            $table->string('nomor_hp', 20)->nullable();
            $table->string('nomor_wa', 20)->nullable();
            $table->string('status')->default('Belum di Verifikasi');
            $table->boolean('deleted')->default(false);

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
        Schema::dropIfExists('kegiatans');
    }
}
