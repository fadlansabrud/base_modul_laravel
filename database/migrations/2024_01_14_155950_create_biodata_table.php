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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id('id_biodata');
            $table->bigInteger('id_user')->unsigned();
            $table->string('posisi');
            $table->string('nama');
            $table->bigInteger('no_ktp');
            $table->string('ttl');
            $table->string('jenkel');
            $table->string('agama');
            $table->string('gol_darah');
            $table->string('status');
            $table->text('alamat_ktp');
            $table->text('alamat_tinggal');
            $table->bigInteger('no_telp');
            $table->string('orang_terdekat');
            $table->string('skill');
            $table->integer('penempatan');
            $table->integer('gaji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
};
