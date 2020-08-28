@extends('base')

@section('content')
	<div class="card">
        <div class="card-header">
            <div class="card-title">Toko</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Pemilik</th>
                    <th>Nomor_hp</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($toko as $no=>$toko)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $toko->nama }}</td>
                        <td>{{ $toko->pemilik }}</td>
                        <td>{{ $toko->nomor_hp }}</td>
                        <td>{{ $toko->telepon }}</td>
                        <td>{{ $toko->email }}</td>
                        <td>{{ $toko->status }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-warning"
                                   href="{{ route('toko.edit', ['id' => $toko->id]) }}">Edit</a>
                                <a class="btn btn-danger"
                                   href="{{ route('toko.delete', ['id' => $toko->id]) }}">Del</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
