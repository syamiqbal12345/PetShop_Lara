@extends('base')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                Item Transaksi
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>BARANG</th>
                    <th>JUMLAH</th>
                    <th>SATUAN</th>
                    <th>HARGA</th>
                </tr>
                </thead>
                @foreach($transactions as $l => $transaction)
                    <tr>
                        <td colspan="5">Transaksi ke-{{ $l + 1 }} Tanggal {{ $transaction->tanggal }}</td>
                    </tr>
                    @foreach($transaction->items as $i =>$item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->barang->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>

    </div>

@endsection
