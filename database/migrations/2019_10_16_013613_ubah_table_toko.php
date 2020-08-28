<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UbahTableToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toko', function (Blueprint $table) {
            $table->removeColumn('pemilik');
            $table->removeColumn('ktp_pemilik');
            $table->string('telepon');
            $table->string('email');
            $table->integer('pengguna_id');
            $table->integer("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('toko', function (Blueprint $table) {
            //
        });
    }
}
