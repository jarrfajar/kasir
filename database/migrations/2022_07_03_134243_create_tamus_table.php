<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('kab/kota');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('rt/rw');
            $table->string('kel/desa');
            $table->string('kecamatan');
            $table->string('warga_negara');
            $table->string('nomor');
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
        Schema::dropIfExists('tamus');
    }
};
