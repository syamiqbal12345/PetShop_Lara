@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h2 class="text-blue fw-bold">PROFIL TOKO</h2>
				<div class="pull-right">
					<a style="color:#fff" href="/toko/1/edit" class="btn btn-primary">Edit</a>
				</div>
			</div>
		</div>

		<div class="card-body">
		<table class="table table-bordered">
		<tr>
        <td rowspan="15" width="250px">
            <img src="https://www.tuntasonline.com/sites/default/files/styles/photo_large/public/articles/b491f547-b9cc-4619-a5be-cdd3e573aa74.jpg?itok=ZrNJs33E" width="250px" height="420px"/>
        </td>
    </tr>
    <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>Toko Surisa</td>
    </tr>
    <tr>
            <td><b>Pemilik</b></td>
            <td>:</td>
            <td>Syam Iqbal</td>
    </tr>
    <tr>
            <td><b>KTP Pemilik</b></td>
            <td>:</td>
            <td>640002472627736</td>
    </tr>
    <tr>
            <td><b>Nomor HP</b></td>
            <td>:</td>
            <td>082273639346</td>
    </tr>
    <tr>
            <td><b>Telepone</b></td>
            <td>:</td>
            <td>082273639346</td>
    </tr>
    <tr>
            <td><b>Email</b></td>
            <td>:</td>
            <td>syamiqbal1234@gmail.com</td>
    </tr>
    <tr>
            <td><b>Alamat</b></td>
            <td>:</td>
            <td>Jalan.Pesugihan, Komplek Harapan Baru, Samarinda Sebrang, Kalimantan Timur</td>
    <tr>
            <td><b>Status</b></td>
            <td>:</td>
 <td colspan="1" > <a href="#"style="text-decoration: none;" target="_parent"><input
 type="button" class="btn btn-success"value="Buka"/></a>
 </td>
    </tr>
    <tr>
            <td><b>Barang Toko</b></td>
            <td>:</td>
 <td colspan="1" > <a href="/coba"style="text-decoration: none;" target="_parent"><input
 type="button" class="btn btn-info"value="Yuk Dilihat"/></a>
 </td>
    </tr>
			</tr>
         </table>
	</div>
</div>
@endsection