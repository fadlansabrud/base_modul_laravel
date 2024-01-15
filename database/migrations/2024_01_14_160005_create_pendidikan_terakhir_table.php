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
        Schema::create('pendidikan_terakhir', function (Blueprint $table) {
            $table->id('id_pendidikan');
            $table->bigInteger('id_biodata')->unsigned();
            $table->string('jenjang_pendidikan');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->integer('tahun_lulus');
            $table->string('ipk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_terakhir');
    }
};
