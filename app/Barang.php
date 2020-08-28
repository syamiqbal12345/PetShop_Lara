<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";

    protected $fillable = ['nama','kategori_id','harga','toko_id','foto', 'stok'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, "toko_id", "id");
    }

    public function pembelian()
    {
        return $this->hasMany(ItemTransaksi::class, "barang_id", "id");
    }

}
