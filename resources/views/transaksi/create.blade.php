@extends('layouts.template')

@section('title')
Transaksi
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic Form Inputs</h5>
    </div>
    <div class="card-block">
        <h4 class="sub-title">Basic Inputs</h4>
        <form class="custom-validation" method="POST" action="{{ route('transaksi.store') }}"  novalidate="">
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
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <select name="idorder" class="form-control">
                        <option value="">Choose Product</option>
                        @foreach ($order as $row)
                        <option value="{{$row->idorder}}">{{$row->harga}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <select name="id" class="form-control">
                        <option value="">Choose Product</option>
                        @foreach ($user as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control">
                        <option value="opt1">Select One Value Only</option>
                        <option value="1">Sudah</option>
                        <option value="2">Belum</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Metode</label>
                <div class="col-sm-10">
                    <select name="metode" class="form-control">
                        <option value="opt1">Select One Value Only</option>
                        <option value="1">Cod</option>
                        <option value="2">Transfer Bank</option>
                    </select>
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
