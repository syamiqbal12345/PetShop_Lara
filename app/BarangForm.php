<?php

namespace App;

use Kris\LaravelFormBuilder\Form;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BarangForm extends Form
{
    public function buildForm()
    {
        $cats = Kategori::all();
        $this
		->add("nama")
		->add("harga")
		->add("stok")
		->add("kategori_id", 'select', [
		    'choices' => $cats->pluck("nama", 'id')->toArray(),
            'label' => 'Kategori'
        ])
		->add("foto", 'file')
		->add('Simpan', 'submit');
    }
}
