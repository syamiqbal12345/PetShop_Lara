<?php

namespace App;

use Kris\LaravelFormBuilder\Form;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ItemTransaksiForm extends Form
{
    public function buildForm()
    {
        $this
        ->add("harga")
        ->add("jumlah")
        ->add("total")
        ->add("rating")

        ->add('Simpan', 'submit');
    }
}
