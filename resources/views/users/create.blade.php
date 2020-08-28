@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">User Registration</div>
        </div>
        <div class="card-body">
            {!! form($form) !!}
        </div>
    </div>
@endsection
