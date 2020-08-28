<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

use App\Barang;

Route::get('/', function () {
    $data_barang = Barang::all();
    return view('welcome', [
        'data_barang' => $data_barang
    ]);
})->name('welcome.index');


Route::get('/profiltoko', function () {
    return view('profiltoko');
})->name("profil-toko");

Route::match(["post", "get"], '/profile', function (\Illuminate\Http\Request $request) {
    $user = auth()->user();
    $pengguna = $user->pengguna;
    $arrayLevel = explode(",", $user->level);
    $arrayLevel = array_map(function($item) {
        return trim($item);
    }, $arrayLevel);

    if ($request->isMethod("POST")) {
        $status = $request->get("status_kurir",0);
        if ($status == 1)
            array_push($arrayLevel, "kurir");

        if ($status == 0) {

            if (($key = array_search("kurir", $arrayLevel)) !== false) {
                unset($arrayLevel[$key]);

            }
        }


        $user->level = implode(", ", $arrayLevel);
        $user->save();
    }



    return view('edit', ['profile' => $pengguna, 'arrayLevel' => $arrayLevel]);
});

Route::get('/edit', function () {return view('edit'); });


Route::get('/kurir', function () { return view('kurir'); });

Route::get('/transaksi', function () { return view('transaksi'); });

Route::get('/makananberat', function () { return view('makananberat'); });

Route::get('/lihat', function () { return view('lihat'); });

Route::get('/riwayat', function () { return view('riwayat'); });

Route::get('/makananringan', function () { return view('makananringan'); });

Route::get('/minuman', function () { return view('minuman'); });

Route::get('/kerajinan', function () { return view('kerajinan'); });

Route::get('/lainlain', function () { return view('lainlain'); });


Route::get('/admin', function () { return view('admin'); });


Route::get("/users", 'UserController@index')->name("user.index");

Route::get("/users/create", 'UserController@create')->name("user.create");

Route::post("/users", 'UserController@store')->name("user.store");

Route::get("/users/{id}/edit", 'UserController@edit')->name("user.edit");

Route::post("/users/{id}", 'UserController@update')->name("user.update");

Route::get("/users/{id}/delete", 'UserController@delete')->name("user.delete");



Route::get("/toko", 'TokoController@index')->name("toko.index");

Route::get("/toko/create", 'TokoController@create')->name("toko.create");

Route::post("/toko", 'TokoController@store')->name("toko.store");

Route::get("/toko/{id}/edit", 'TokoController@edit')->name("toko.edit");

Route::post("/toko/{id}", 'TokoController@update')->name("toko.update");

Route::get("/toko/{id}/delete", 'TokoController@delete')->name("toko.delete");


Route::middleware(['auth'])->group(function(){

    Route::get("/barang", 'BarangController@index')->name("barang.index");

    Route::get("/barang/create", 'BarangController@create')->name("barang.create");

    Route::post("/barang", 'BarangController@store')->name("barang.store");

    Route::get("/barang/{id}/edit", 'BarangController@edit')->name("barang.edit");

    Route::post("/barang/{id}", 'BarangController@update')->name("barang.update");

    Route::get("/barang/{id}/delete", 'BarangController@delete')->name("barang.delete");

});

Route::get("/barang/{id}", 'BarangController@show')->name("barang.show");


Route::get("/kategori", 'KategoriController@index')->name("kategori.index");

Route::get("/kategori/create", 'KategoriController@create')->name("kategori.create");

Route::post("/kategori", 'KategoriController@store')->name("kategori.store");

Route::get("/kategori/{id}/edit", 'KategoriController@edit')->name("kategori.edit");

Route::post("/kategori/{id}", 'KategoriController@update')->name("kategori.update");

Route::get("/kategori/{id}/delete", 'KategoriController@delete')->name("kategori.delete");


Route::get("/itemtransaksi", 'ItemTransaksiController@index')->name("itemtransaksi.index");

Route::get("/item-transaksi-toko", 'ItemTransaksiController@listPerToko')->name("itemtransaksi.list-toko");

Route::post("/item-transaksi-update", 'ItemTransaksiController@updateTransaksi')->name("itemtransaksi.index.update");

Route::get("/itemtransaksi/create", 'ItemTransaksiController@create')->name("itemtransaksi.create");

Route::post("/itemtransaksi", 'ItemTransaksiController@store')->name("itemtransaksi.store");

Route::get("/itemtransaksi/{id}/edit", 'ItemTransaksiController@edit')->name("itemtransaksi.edit");

Route::post("/itemtransaksi/{id}", 'ItemTransaksiController@update')->name("itemtransaksi.update");

Route::get("/itemtransaksi/{id}/delete", 'ItemTransaksiController@delete')->name("itemtransaksi.delete");


Route::get("/transaksi", 'TransaksiController@index')->name("transaksi.index");


Route::get("/transaksi/create", 'TransaksiController@create')->name("transaksi.create");
Route::post("/transaksi", 'TransaksiController@store')->name("transaksi.store");
Route::get("/transaksi/{id}/edit", 'TransaksiController@edit')->name("transaksi.edit");
Route::post("/transaksi/{id}", 'TransaksiController@update')->name("transaksi.update");
Route::get("/transaksi/{id}/delete", 'TransaksiController@delete')->name("transaksi.delete");
Route::get("/transaksi/{id}/show", 'TransaksiController@show')->name("transaksi.show");
Route::get("/my-transaksi", 'TransaksiController@myTransaction')->name("transaksi.my");
Route::post("/transaksi-set-kurir", 'TransaksiController@setKurir')->name("transaksi.set-kurir");




Route::get('/login','SecurityController@login')->name('login');
Route::post('/login','SecurityController@prosesLogin')->name('login.proses');

Route::get('/registrasi', function () { return view('/users/create'); });

Route::get('/logout', 'SecurityController@logout')->name('login');
Route::get('/logout', 'SecurityController@logout');


