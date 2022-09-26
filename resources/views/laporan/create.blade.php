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
        <form class="custom-validation" method="POST" action="{{ route('laporan.store') }}"  novalidate="">
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
                <label class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <select name="id" class="form-control">
                        <option value="">Choose Name</option>
                        @foreach ($user as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="idt" class="form-control">
                        <option value="">Choose Status</option>
                        @foreach ($transaksi as $row)
                        <option value="{{$row->idt}}">{{$row->idt}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl" class="form-control" required="" placeholder="Silahkan input nama">
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
