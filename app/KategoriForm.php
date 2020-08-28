<?php

namespace App;

use Kris\LaravelFormBuilder\Form;

class KategoriForm extends Form
{
    public function buildForm()
    {
        $this
		->add("nama")
		->add("keterangan")
		
		->add('Simpan', 'submit')
		;
    }
}
