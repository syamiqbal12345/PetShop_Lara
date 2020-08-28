<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use App\ItemTransaksiForm;
use App\ItemTransaksi;
use App\Barang;
use App\User;

class ItemTransaksiController extends Controller
{
    public function updateTransaksi(Request $request)
    {
        $action = $request->get("action", "update");
        if ($action == "update") {
            foreach ($request->get('item_transaksi') as $id=>$item) {
                $itemTransaksi = ItemTransaksi::find($id);
                $itemTransaksi->jumlah = $item['jumlah'];
                $itemTransaksi->save();
            }

            return back();
        }

        if ($action == "beli") {
            $beli = new Collection();
            $ids = [];
            foreach ($request->get('item_transaksi') as $id=>$item) {
                if (isset($item['selected'])) {
                    $ids[] = $id;
                }
            }

            if (count($ids) == 0)
                return back();

            $items = ItemTransaksi::whereIn('id', $ids)->get();


            return view("itemtransaksi.daftar-transaksi", compact('items'));
        }

        if ($action == "yes") {
            $transaksi = new Transaksi();
            $transaksi->fill([
                'pembeli_id' => \auth()->user()->pengguna->id,
                'tanggal' => new \DateTime(),
                'status' => 1,
                'total' => $request->get('total'),
                'biaya_kurir' => $request->get('ongkir'),
                'alamat' =>\auth()->user()->pengguna->alamat,
            ])->save();

            foreach ($request->get('item_transaksi') as $id) {
                $item = ItemTransaksi::find($id);
                $item->transaksi_id = $transaksi->id;
                $item->save();
            }

            return redirect(route("transaksi.my"));
        }

    }

    public function index()
    {
		$itemtansaksi = ItemTransaksi::where('transaksi_id',0)->get();
		$data = [ 'itemtransaksi' => $itemtansaksi ];
		return view("itemtransaksi.index", $data);
	}

	public function create(FormBuilder $formBuilder)
	{

		$form = $formBuilder->create(ItemTransaksiForm::class, [
			'method' => 'POST', 'url' => route('itemtransaksi.store')
		]);

		$data = [
			'form' => $form
		];
		return view('itemtransaksi.create', $data);
	}

	public function store(Request $request)
	{
	    $user = Auth::user();
	    $pembeli = $user->pengguna;
		$data = $request->all();
		$barang = Barang::find($request->get('barang_id'));
        $data ['transaksi_id'] = 0;
        $data ['pembeli_id'] = $pembeli->id;
        $data ['harga'] = $barang->harga;
        $data ['total'] = $barang->harga * $request->get("jumlah");

		$itemtransaksi = new ItemTransaksi();
		$itemtransaksi->fill($data)->save();
		return redirect(route('itemtransaksi.index'))->withMessage("Data telah disimpan");
	}

	public function edit($id, FormBuilder $formBuilder)
	{
		$itemtansaksi = ItemTransaksi::find($id);
		$form = $formBuilder->create(ItemTransaksiForm::class, [
			'method' => 'POST', 'url' => route('itemtransaksi.update', ['id' => $id]),

		]);

		$data = [
			'form' => $form
		];
		return view('itemtransaksi.create', $data);
	}
	public function update($id, Request $request)
	{
			$itemtransaksi = ItemTransaksi::find($id);
			$itemtransaksi->fill($request->all())->save();
			return redirect(route('itemtransaksi.index'))->withMessage("Data telah disimpan");
	}

	public function delete($id)
	{
		ItemTransaksi::destroy($id);
		return back()->withMessage("Data telah dihapus");
	}

    public function listPerToko()
    {
        $toko = auth()->user()->pengguna->toko;
        $t = Transaksi::with(['items' => function($q) use($toko) {
            $q->with(['barang' => function($q) use($toko) {
                $q->where('toko_id', $toko->id);
            }]);
        }])->get();

        return view('itemtransaksi.transaksi-toko', ['transactions' => $t]);
	}
}
