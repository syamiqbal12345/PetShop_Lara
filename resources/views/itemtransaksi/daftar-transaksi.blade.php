@extends("base")

@section("content")
    <div class="card">
        <div class="card-header">
            <div class="card-title">DETAIL TRANSAKSI</div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                {{ csrf_field() }}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>BARANG</th>
                    <th>TOKO</th>
                    <th>SATUAN</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                </tr>
                </thead>
                <tbody>
                @php
                $total = 0;
                $jumlah_toko = 0;
                $toko = [];
                @endphp
                @foreach($items as $i => $item)
                    <input type="hidden" name="item_transaksi[{{ $item->id }}]" value="{{ $item->id }}">
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->barang->nama }}</td>
                        <td>{{ $item->barang->toko->nama }}</td>
                        <td>{{ $item->barang->harga }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td class="text-right">{{ $item->total }}</td>
                    </tr>
                    @php
                    $total += $item->total;
                    if (!in_array($item->barang->toko->id, $toko)) {
                        $toko[] = $item->barang->toko->id;
                    }
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5">Total Belanjaan</td>
                    <td class="text-right">{{ $total }}</td>
                </tr>
                <tr>
                    <td colspan="5">Ongkos Kirim</td>
                    <td class="text-right">{{ 10000 + (count($toko) -1 ) * 5000 }}</td>
                </tr>
                <tr>
                    <td colspan="5">Total Transaksi</td>
                    <td class="text-right">{{ 10000 + (count($toko) -1 ) * 5000 + $total }}</td>
                </tr>
                </tbody>

                <input type="hidden" name="ongkir" value="{{ 10000 + (count($toko) -1 ) * 5000 }}">
                <input type="hidden" name="total" value="{{ 10000 + (count($toko) -1 ) * 5000 + $total }}">
            </table>

            <div class="text-center">
                <button class="btn btn-primary" name="action" value="yes" type="submit">Beli</button>
                <a href="#" class="btn btn-danger">Batal</a>
            </div>
            </form>
        </div>
    </div>





@endsection
