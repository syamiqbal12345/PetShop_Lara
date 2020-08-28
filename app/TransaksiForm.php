<?php

namespace App;

use Kris\LaravelFormBuilder\Form;

class TransaksiForm extends Form
{
    public function buildForm()
    {
        $this 
        ->add("tanggal")
        ->add("status")
        ->add("total")
        ->add("kurir_id")
        ->add("alamat")
        ->add("biaya_kurir")
        ->add("rating")

        ->add('Simpan', 'submit');
    }
}
