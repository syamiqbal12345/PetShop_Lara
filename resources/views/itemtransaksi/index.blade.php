@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				Item Transaksi
			</div>
		</div>
		<div class="card-body">
            <form action="{{ route('itemtransaksi.index.update') }}" method="post">
                {{ csrf_field() }}
		<table class="table table-bordered">
		<thead>
			<tr>
				<th><input type="checkbox"></th>
				<th>Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
        <tbody>
            @foreach ($itemtransaksi as $no=>$item)
                <input type="hidden" name="item_transaksi[{{ $item->id }}][id]" value="{{ $item->id }}">
            <tr>
                <td><input type="checkbox" name="item_transaksi[{{ $item->id }}][selected]" value="{{ $item->id }}"></td>
                <td>{{ $item->barang->nama }} </td>
                <td>{{ $item->harga }} </td>
                <td>
                    <select name="item_transaksi[{{ $item->id }}][jumlah]" class="form-control">
                        @for($i =1; $i <= $item->barang->stok; $i++)
                            <option value="{{ $i }}" @if($i == $item->jumlah)selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td>{{ $item->total }} </td>
                <td class="text-right">
                    <a class="btn btn-danger" href="{{ route('itemtransaksi.delete', ['id' => $item->id]) }}">
                        <i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
		</tbody>
	    </table>
        <div class="text-center">
            <button type="submit" name="action" value="update" class="btn btn-success">Update</button>
            <button type="submit" name="action" value="beli" class="btn btn-warning">Beli</button>
        </div>
        </form>
	</div>
@endsection
