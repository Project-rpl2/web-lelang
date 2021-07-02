<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang',25);
            $table->date('tgl');
            $table->string('gambar');
            $table->integer('harga_awal');
            $table->string('deskripsi_barang',100);
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
        Schema::dropIfExists('tb_barangs');
    }
}
