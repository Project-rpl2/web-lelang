<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelelangs', function (Blueprint $table) {
            $table->id();
            //$table->text('tb_barangs_id');
            $table->text('tb_barangs_id');
            // $table->foreignId('tb_lelangs_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->text('tb_lelangs_id');
            $table->unsignedBigInteger('users_id');
            $table->text('bid');
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
        Schema::dropIfExists('pelelangs');
    }
}
