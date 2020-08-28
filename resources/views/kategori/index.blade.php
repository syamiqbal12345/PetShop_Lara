@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				Data Kategori
				<div class="pull-right">
					<a style="color:#fff" href="{{ route("kategori.create") }}" class="btn btn-primary">Tambah</a>
				</div>
			</div>

		</div>
	
		<div class="card-body">
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Keterangan</th>
				<th>Opsi</th>
			</tr>
		</thead>
<tbody>
@foreach ($kategori as $no=>$item)
	<tr>
		<td>{{ $no + 1 }}</td>
		<td>{{ $item->nama }} </td>
		<td>{{ $item->keterangan }} </td>
		<td>
		<div class="btn-group btn-group-sm">
			<a class="btn btn-warning" href="{{ route('kategori.edit', ['id'=> $item->id]) }}">Edit</a>
			<a class="btn btn-danger" href="{{ route('kategori.delete', ['id' => $item->id]) }}">Del</a>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		</div>
	</div>
@endsection