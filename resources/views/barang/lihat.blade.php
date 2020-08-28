@extends("base")

@section("content")

    <div class="card mb-3" style="max-width: 1050px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$barang->foto) }}" width="300px" class="card-img" alt="gambar">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title pb-10 fw-bold">{{ $barang->nama }}</h5>
                    {{--        <p class="card-text">Lay's adalah produk kripik kentang yang terkenal dengan rasa gurih yang luar biasa, nikmati kualitas terbaik dari merek yang sudah diakui secara Internasional. Renyahnya Lays siap hadir di keseharianmu dengan 6 rasa yang menggugah selera</p>--}}

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga : Rp. {{ $barang->harga }}.-/Pcs</li>
                    </ul>
                    <div class="o-layout o-layout--tiny">
                        <div class="o-layout__item u-4of12 js-qty-field">
                            <div class="c-inp-grp-table">
                                <h5 class="card-sub-title">Jumlah stok : {{ $barang->stok }}</h5>

                            </div>
                            <div class="container">
                                <div class="button-container">
                                    @if($barang->stok > 0)
                                        <form action="{{ route('itemtransaksi.store') }}" method="post">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                            <select name="jumlah" class="form-control">

                                                @for($i=1; $i <= $barang->stok; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @if(auth()->user() == null)
                                                <a href="{{ route('login') }}" class="btn btn-warning"><span>Registrasi atau Login</span></a>
                                            @else
                                                <button type="submit" class="btn btn-primary"><span>Beli Sekarang</span></button>
                                            @endif

                                        </form>
                                    @endif
                                </div>
                            </div>
                            <style>
                                @import url(http://fonts.googleapis.com/css?family=Roboto);
                                /*--------------------------------Button starts--------------------------------*/
                                .button-container {
                                    text-align: center;
                                }
                                .button {
                                    position: relative;
                                    background: currentColor;
                                    border: 1px solid currentColor;
                                    font-size: 1.1rem;
                                    color: #D81900;
                                    margin: 3rem 0;
                                    padding: 0.75rem 3rem;
                                    cursor: pointer;
                                    -webkit-transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
                                    transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
                                    overflow: hidden;
                                    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
                                }
                                .button span {
                                    color: #fff;
                                    position: relative;
                                    z-index: 1;
                                }
                                .button::before {
                                    content: '';
                                    position: absolute;
                                    background: #071017;
                                    border: 50vh solid #1d4567;
                                    width: 30vh;
                                    height: 30vh;
                                    border-radius: 50%;
                                    display: block;
                                    top: 50%;
                                    left: 50%;
                                    z-index: 0;
                                    opacity: 1;
                                    -webkit-transform: translate(-50%, -50%) scale(0);
                                    transform: translate(-50%, -50%) scale(0);
                                }
                                .button:hover {
                                    color: #D81900;
                                    box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
                                }
                                .button:active::before, .button:focus::before {
                                    -webkit-transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
                                    transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
                                    transition: transform 1.12s ease, opacity 0.28s ease 0.364s;
                                    transition: transform 1.12s ease, opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
                                    -webkit-transform: translate(-50%, -50%) scale(1);
                                    transform: translate(-50%, -50%) scale(1);
                                    opacity: 0;
                                }
                                .button:focus {
                                    outline: none;
                                }
                                /*--------------------------------Button ends--------------------------------*/
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
