<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelangs', function (Blueprint $table) {
            $table->id();
            // $table->foreign('id_barang')->references('id')->on('tb_barangs');
            $table->BigInteger('tb_barangs_id');
            $table->date('tgl_lelang');
            $table->text('pelelangs_id')->nullable();
            $table->text('pemenang')->nullable();
            // $table->integer('harga_akhir');
            $table->unsignedBigInteger('users_id');
            // $table->integer('id_petugas');
            $table->enum('status',['dibuka','ditutup']);
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
        Schema::dropIfExists('tb_lelangs');
    }
}
