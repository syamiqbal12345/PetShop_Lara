<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\TransaksiForm;
use App\Transaksi;
use App\Pembeli;
use App\Pengguna;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
		$transaksi = Transaksi::all();

		if (strpos($user->level, "kurir")) {
		    $transaksi = Transaksi::where('kurir_id', auth()->user()->pengguna->id)->get();
        }

		$data = [ 'transaksi' => $transaksi ];
		return view("transaksi.index", $data);
	}

    public function myTransaction()
    {
        $transaksi = Transaksi::where("pembeli_id", \auth()->user()->pengguna->id)->get();

        $data = [ 'transaksi' => $transaksi ];
        return view("transaksi.index", $data);
    }

    public function setKurir(Request $request)
    {
        $t = Transaksi::find($request->get('transaksi_id'));

        if ($request->get('kurir_id') == null)
            return back();

        $t->kurir_id = $request->get('kurir_id');
        $t->save();

        return back();

    }

    public function show($id)
    {
        $user = \auth()->user();
        $arrayLevel = explode(",", $user->level);
        $arrayLevel = array_map(function($item){
            return trim($item);
        }, $arrayLevel);

        $dataKurir = User::with("pengguna")->where("level", "like", "%kurir%")->get();

        $transaksi = Transaksi::find($id);
        $data = [ 'transaksi' => $transaksi, 'arrayLevel' => $arrayLevel, 'dataKurir' => $dataKurir ];
        return view("transaksi.show", $data);
    }

	public function create(FormBuilder $formBuilder)
	{


		$form = $formBuilder->create(TransaksiForm::class, [
			'method' => 'POST', 'url' => route('transaksi.store')
		]);

		$data = [
			'form' => $form
		];
		return view('transaksi.create', $data);
	}

	public function store(Request $request)
	{
		$pengguna = Pengguna::where('user_id', '=', Auth::user()->id)->firstOrFail();
		$user = Auth::user();
		//$pembeli = $user->pengguna->;
		$data = $request->all();
		if ($pengguna->user_id == Auth::user()->id) {
			$data['pembeli_id'] = $pengguna->id;
		}

		$transaksi = new Transaksi();
		$transaksi->fill($data)->save();
		return redirect(route('transaksi.index'))->withMessage("Data telah disimpan");
	}

	public function edit($id, FormBuilder $formBuilder)
	{
		$barang = Transaksi::find($id);
		$form = $formBuilder->create(TransaksiForm::class, [
			'method' => 'POST', 'url' => route('transaksi.update', ['id' => $id]),
			'model' => $barang
		]);

		$data = [
			'form' => $form
		];
		return view('transaksi.create', $data);
	}
	public function update($id, Request $request)
	{
			$transaksi = Transaksi::find($id);
			$transaksi->fill($request->all())->save();
			return redirect(route('transaksi.index'))->withMessage("Data telah disimpan");
	}

	public function delete($id)
	{
		Transaksi::destroy($id);
		return back()->withMessage("Data telah dihapus");
	}
}
