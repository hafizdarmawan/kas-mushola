<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasPemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_pemasukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_users');
            $table->string('sumber');
            $table->BigInteger('jumlah');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->timestamps();
            // $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_pemasukan');
    }
}
