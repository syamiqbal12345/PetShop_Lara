<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table="transaksi";
    protected $fillable = [
        "pembeli_id","tanggal","status","total","kurir_id","alamat","biaya_kurir","rating"];

    public function pembeli()
    {
        return $this->belongsTo(Pengguna::class, "pembeli_id", "id");
    }

    public function kurir()
    {
        return $this->belongsTo(Pengguna::class, "kurir_id", "id");
    }

    public function items()
    {
        return $this->hasMany(ItemTransaksi::class, "transaksi_id", "id");
    }

}
