@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				Data Barang Toko
				<div class="pull-right">
					<a style="color:#fff" href="{{ route("barang.create") }}" class="btn btn-primary">Tambah</a>
				</div>
			</div>

		</div>
		<div class="card-body">
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Harga</th>
                <th>Stok</th>
                <th>Pembelian</th>
                <th>Foto</th>
				<th>Opsi</th>
			</tr>
		</thead>
        <tbody>
        @foreach ($barang as $no=>$item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->nama }} </td>
                <td>{{ $item->harga }} </td>
                <td>{{ $item->stok}}</td>
                <td>{{ $item->pembelian->count()}}</td>
                <td><img src="{{ asset ('storage/'.$item->foto) }}" width="100"> </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning" href="{{ route('barang.edit', ['id' => $item->id]) }}">Edit</a>
{{--                        <a class="btn btn-danger" href="{{ route('barang.delete', ['id' => $item->id]) }}">Del</a>--}}
                    </div>
                </td>
            </tr>
                    @endforeach
        </tbody>
	</table>
</div>
	</div>
@endsection
