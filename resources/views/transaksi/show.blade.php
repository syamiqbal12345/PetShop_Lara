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
                    @foreach($transaksi->items as $i => $item)
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

{{--                <div class="text-center">--}}
{{--                    <button class="btn btn-primary" name="action" value="yes" type="submit">Beli</button>--}}
{{--                    <a href="#" class="btn btn-danger">Batal</a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Informasi Pembeli</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>NAMA</th>
                    <td>{{ $transaksi->pembeli->nama }}</td>
                </tr>
                <tr>
                    <th>ALAMAT PENGIRIMAN</th>
                    <td>{{ $transaksi->alamat }}</td>
                </tr>

            </table>
        </div>
    </div>

    @if($transaksi->kurir_id !=0 || $transaksi->kurir_id !=null)
        <div class="card">
            <div class="card-header">
                <div class="card-title">Informasi Kurir</div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Kurir</th>
                        <td>{{ $transaksi->kurir->nama }}</td>

                    </tr>
                </table>
            </div>
        </div>
    @endif



    @if(in_array('admin', $arrayLevel))

        <div class="card">
            <div class="card-header">
                <div class="card-title">Informasi Kurir</div>
            </div>
            <div class="card-body">
                <form action="{{ route('transaksi.set-kurir') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}">
                <table class="table table-bordered">
                    <tr>
                        <th>Kurir</th>

                    </tr>

                    @foreach($dataKurir as $kurir)
                        <tr>
                            <td>
                                <input id="kurir_id" type="radio" name="kurir_id" value="{{ $kurir->pengguna->id }}" @if($kurir->pengguna->id == $transaksi->kurir_id) checked @endif>
                                <label for="kurir_id">{{ $kurir->pengguna->nama }}</label>
                            </td>
                        </tr>
                    @endforeach

                </table>

                    <button class="btn btn-primary" type="submit">Set Kurir</button>
                </form>
            </div>
        </div>

    @endif
@endsection
