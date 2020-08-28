<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaksi extends Model
{
    protected $table="item_transaksi";
    protected $fillable = ["transaksi_id", "barang_id", "harga", "jumlah", "total", "rating", "pembeli_id"];

    public function transaksi()
    {

    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, "barang_id", "id");
    }
}
