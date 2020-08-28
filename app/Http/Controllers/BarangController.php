<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\BarangForm;
use App\Barang;
use App\Toko;
use App\User;
use function GuzzleHttp\Psr7\str;

class BarangController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $barang = [];
        $pengguna = $user->pengguna;
        if (strpos("admin", $user->level)) {
            $barang = Barang::all();
        } else {
            if ($pengguna->toko) {
                $barang = Barang::where('toko_id', $pengguna->toko->id)->get();
            }
        }
		$data = [ 'barang' => $barang ];
		return view("barang.index", $data);
	}

    public function show($id)
    {
        $barang = Barang::find($id);
        $data = [ 'barang' => $barang ];
        return view("barang.lihat", $data);
    }

	public function create(FormBuilder $formBuilder)
	{
		$form = $formBuilder->create(BarangForm::class, [
			'method' => 'POST', 'url' => route('barang.store')
		]);

		$data = [
			'form' => $form
		];
		return view('barang.create', $data);
	}

	public function store(Request $request)
	{

//	    if ($request->foto != null) {
//            $ext = $request->foto->extension();
//            $namaFile = sprintf("%d.%s", time(), $ext);
//            $request->foto->move(public_path('images'), $namaFile);
//        }
        $user = \Auth::user();
        $toko = $user->pengguna->toko;
        $data = $request->all();

        if (request()->has('foto')){
                    $ext = $request->foto->extension();
            $namaFile = sprintf("%d.%s", time(), $ext);
            $nama = request()->foto->store('images', 'public');
            $data['foto'] = $nama;
        }


		$data['toko_id'] = $toko->id;

		$barang = new Barang();
		$barang->fill($data)->save();
		return redirect(route('barang.index'))->withMessage("Data telah disimpan");
	}

	public function edit($id, FormBuilder $formBuilder)
	{
		$barang = Barang::find($id);
		$form = $formBuilder->create(BarangForm::class, [
			'method' => 'POST', 'url' => route('barang.update', ['id' => $id]),
			'model' => $barang
		]);

		$data = [
			'form' => $form
		];
		return view('barang.create', $data);
	}

	public function update($id, Request $request)
	{
        $barang = Barang::find($id);
        $data = $request->all();

        if (request()->has('foto')){
            $ext = $request->foto->extension();
            $namaFile = sprintf("%d.%s", time(), $ext);
            $nama = request()->foto->store('images', 'public');
            $data['foto'] = $nama;
        }
        $barang->fill($data)->save();
        return redirect(route('barang.index'))->withMessage("Data telah disimpan");
	}

	public function delete($id)
	{
		Barang::destroy($id);
		return back()->withMessage("Data telah dihapus");
	}
}
