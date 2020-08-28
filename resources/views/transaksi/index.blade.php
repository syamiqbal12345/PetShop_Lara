@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				Transaksi ({{ $transaksi->count() }})
			</div>
		</div>
		<div class="card-body">
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>

				<th>Tanggal</th>
                <th>Alamat</th>
				<th>Belanja</th>
				<th>Biaya Kurir</th>
				<th>TOTAL</th>
                <th>Status</th>
                <th><i class="fa fa-eye"></i></th>
			</tr>
		</thead>
        <tbody>
        @foreach ($transaksi as $no=>$item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->tanggal }} </td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->total - $item->biaya_kurir }} </td>
                <td>{{ $item->biaya_kurir }}</td>
                <td>{{ $item->total }} </td>
                <td>{{ $item->status }} </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('transaksi.show', ['id' => $item->id]) }}"><i class="fa fa-search"></i></a>

                </td>
            </tr>
        @endforeach
		</tbody>
	</table>
		</div>
	</div>
@endsection
