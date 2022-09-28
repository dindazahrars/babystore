@extends('layouts.template')

@section('title')
Product
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic Form Inputs</h5>
    </div>
    <div class="card-block">
        <h4 class="sub-title">Basic Inputs</h4>
        <form class="custom-validation" method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data" novalidate="">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
             </ul>
            </div>
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required="" placeholder="Silahkan input nama">
                </div>
            </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="customFile" placeholder="Silahkan masukkan gambar">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                    <input type="text" name="brand" class="form-control" required="" placeholder="Silahkan input brand ">
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desc</label>
                    <div class="col-sm-10">
                        <input type="text" name="desc" class="form-control" required="" placeholder="Silahkan input desc">
                    </div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" name="stock" class="form-control" required="" placeholder="Silahkan input stock">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control" required="" placeholder="Silahkan input harga">
                            </div>
                        </div>
            <div class="mb-0">
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Add
                    </button>
                </div>
            </div>

        </form>

@endsection
