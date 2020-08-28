<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table="toko";

    protected $fillable = ["nama", "alamat", "pemilik", "ktp_pemilik", "nomor_hp", "user_id", "status_user", "telepon", "email", "pengguna_id", "status"];
//    protected $fillable = ["nama", "alamat", "pemilik", "ktp_pemilik", "nomor_hp", "user_id", "status_user", "telepon", "email", "pengguna_id",'status'];

}
