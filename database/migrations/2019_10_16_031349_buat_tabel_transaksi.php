<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("pembeli_id");
            $table->dateTime("tanggal");
            $table->integer("status");
            $table->integer("total")->nullable();
            $table->integer("kurir_id")->nullable();
            $table->text("alamat");
            $table->integer("biaya_kurir")->nullable();
            $table->integer("rating")->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
