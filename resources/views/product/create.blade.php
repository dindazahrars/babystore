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
        <form class="custom-validation" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required="" placeholder="Silahkan input nama">
                </div>
            </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">Images</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="customFile">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                    <input type="text" name="brand" class="form-control" required="" placeholder="Silahkan input nama">
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desc</label>
                    <div class="col-sm-10">
                        <input type="text" name="desc" class="form-control" required="" placeholder="Silahkan input nama">
                    </div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" name="stock" class="form-control" required="" placeholder="Silahkan input nama">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control" required="" placeholder="Silahkan input nama">
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
