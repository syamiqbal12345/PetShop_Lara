@extends('base')

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h2 class="text-blue fw-bold">DATA DIRI</h2>
				<div class="pull-right">
					<a style="color:#fff" href="#" class="btn btn-primary">Edit</a>
				</div>
			</div>
		</div>

		<div class="card-body">
		<table class="table table-bordered">
		<tr>
        <td rowspan="15" width="250px">
{{--            <img src="../assets/img/iqbal.jpg" width="250px" height="420px"/>--}}
        </td>
    </tr>
    <tr>
            <td><b>Nama</b></td>
            <td>{{ $profile->nama }}</td>
    </tr>
    <tr>
            <td><b>Nomor KTP</b></td>
            <td>{{ $profile->nomor_ktp }}</td>
    </tr>
    <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>{{ $profile->kelamin == 1 ? "PRIA": "WANITA" }}</td>
    </tr>
    <tr>
            <td><b>Email</b></td>
            <td>{{ $profile->email }}</td>
    </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td>{{ $profile->alamat }}</td>
            </tr>
            <tr>
                <td><b>Kurir</b></td>
                <td colspan="1" align="left">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        @if(!in_array("kurir", $arrayLevel))
                            <input type="hidden" name="status_kurir" value="1"/>
                            <button type="submit" class="btn btn-success">Available</button>
                        @else
                            <input type="hidden" name="status_kurir" value="0"/>
                            <button type="submit" class="btn btn-danger">Not Available</button>
                        @endif
                    </form>
                </td>
            </tr>
        </table>
	</div>
</div>
@endsection
