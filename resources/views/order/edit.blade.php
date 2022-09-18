@extends('layouts.template')

@section('title')
Order
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic Form Inputs</h5>
    </div>
    <div class="card-block">
        <h4 class="sub-title">Basic Inputs</h4>
        <form class="custom-validation" method="POST" action="{{ route('order.update',[$order->idorder]) }}"  novalidate="">
            @csrf
            {{ method_field('PUT') }}
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
                <label class="col-sm-2 col-form-label">Name Product</label>
                <div class="col-sm-10">
                    <select name="idbarang" class="form-control" >
                        <option value="">Choose Product</option>
                        @foreach ($barang)
                        <option value="{{$row->idbarang}}">{{$row->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="text" name="total" class="form-control" required="" placeholder="Silahkan input nama">
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
