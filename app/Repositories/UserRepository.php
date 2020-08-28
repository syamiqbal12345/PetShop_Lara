<?php

use App\Pengguna;
use App\User;

class UserRepository 
{
    public function registrasi(array $dataPengguna, array $dataUser)
    {
        $user = new User();
        $user->fill($dataUser)->save();
        $pengguna = new Pengguna();
        
        $pengguna->fill($dataUser);
    }
}