@if(Auth::user()->level == 'admin')
@extends('layouts.template')

@section('title')
Dashboard
@endsection
@section('content')
<div class="col-md-6">
    <div class="card bg-c-red total-card">
        <div class="card-block">
            <div class="text-left">
                <h4>{{$jumlahAdmin}}</h4>
                <p class="m-0">Total Admin</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card bg-c-green total-card">
        <div class="card-block">
            <div class="text-left">
                <h4>{{$jumlahPelanggan}}</h4>
                <p class="m-0">Income Status</p>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
@if(Auth::user()->level == 'pelanggan')
@extends('welcome.index')
@endif
