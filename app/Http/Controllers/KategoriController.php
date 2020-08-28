<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\KategoriForm;
use App\Kategori;
use App\BarangForm;

class KategoriController extends Controller
{
    public function index()
    {
		$kategori = Kategori::all();
		$data = [ 'kategori'=>$kategori ];
		return view("kategori.index", $data);
	}

	public function create(FormBuilder $formBuilder)
	{
		$form = $formBuilder->create(KategoriForm::class, [ 
			'method' => 'POST', 'url' => route('kategori.store')
		]);

		$data = [
			'form' => $form
		];
		return view('kategori.create', $data);
	}

	public function store(Request $request)
	{
		
		$user = \Auth::user();
		$data = $request->all();

		$kategori = new Kategori();
		$kategori->fill($data)->save();
		return redirect(route('kategori.index'))->withMessage("Data telah disimpan");
	}

	public function edit($id, FormBuilder $formBuilder)
	{
		$katagori = Kategori::find($id);
		$form = $formBuilder->create(KategoriForm::class, [
			'method' => 'POST', 'url' => route('kategori.update', ['id' => $id]),
			
		]);

		$data = [
			'form' => $form
		];
		return view('kategori.create', $data);
	}
	public function update($id, Request $request)
	{
			$kategori = Kategori::find($id);
			$kategori->fill($request->all())->save();
			return redirect(route('kategori.index'))->withMessage("Data telah disimpan");
	}

	public function delete($id)
	{
		Kategori::destroy($id);
		return back()->withMessage("Data telah dihapus");
	}
}
