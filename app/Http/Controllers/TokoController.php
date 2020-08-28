<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\TokoForm;
use App\Toko;

class TokoController extends Controller
{
    public function index()
    {
		$toko = Toko::all();
		$data = [ 'toko' => $toko ];
		return view("toko.index", $data);
	}

	public function create(FormBuilder $formBuilder)
	{
		$form = $formBuilder->create(TokoForm::class, [
			'method' => 'POST', 'url' => route('toko.store')
		]);

		$data = [
			'form' => $form
		];
		return view('toko.create', $data);
	}

	public function store(Request $request)
	{
		$user = \Auth::user();
		$pengguna = $user->pengguna->id;
		$data = $request->all();
		$data['user_id'] = 0;
		$data['status_user'] = 0;

		$data['pengguna_id'] = $pengguna;

		$toko = new Toko();
		$toko->fill($data)->save();

		return redirect(route('toko.index'))->withMessage("Data telah disimpan");


	}

	public function edit($id, FormBuilder $formBuilder)
	{
		$toko = Toko::find($id);
		$form = $formBuilder->create(TokoForm::class, [
			'method' => 'POST', 'url' => route('toko.update', ['id' => $id]),
			'model' => $toko
		]);

		$data = [
			'form' => $form
		];
		return view('toko.create', $data);
	}
	public function update($id, Request $request)
	{
		$toko = Toko::find($id);
		$toko->fill($request->all())->save();
		return redirect(route('toko.index'))->withMessage("Data telah disimpan");
	}

	public function delete($id)
	{
		Toko::destroy($id);
		return back()->withMessage("Data telah dihapus");
	}
}
