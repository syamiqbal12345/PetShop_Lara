<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";

    protected $fillable = ["nama", "nomor_ktp", "kelamin", "alamat", "email", "foto", "user_id"];

    public function user() 
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function toko() 
    {
        return $this->hasOne(Toko::class, "pengguna_id", "id");
    }
}
