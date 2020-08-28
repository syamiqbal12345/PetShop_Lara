@extends("base")

@section("content")
    <div class="row">
        @foreach($data_barang as $item)
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="card">
                    <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama}}</h5>
                        <p>{{ $item->toko->nama}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga : Rp. {{ $item->harga}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route("barang.show", ['id' => $item->id ]) }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
