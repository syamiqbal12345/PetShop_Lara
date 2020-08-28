<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelItemTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("transaksi_id");
            $table->integer("barang_id");
            $table->integer("harga");
            $table->integer("jumlah");
            $table->integer("total")->nullable();
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
        Schema::dropIfExists('item_transaksi');
    }
}
