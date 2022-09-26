@extends('layouts.template')

@section('title')
Dashboard
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic Form Inputs</h5>
    </div>
    <div class="card-block">
        <h4 class="sub-title">Basic Inputs</h4>
        <form class="custom-validation" method="POST" action="{{ route('user.update',[$user->id]) }}" novalidate="">
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
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required="" placeholder="Silahkan input nama" value="{{ $user->name }}">
                </div>
            </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" required="" parsley-type="email" placeholder="Silahkan masukan email yang benar" value="{{ $user->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select name="level" class="form-control">
                        <option value="opt1">Select One Value Only</option>
                        <option value="admin" @if($user->level == "admin") selected @endif>Admin</option>
                        <option value="pelanggan" @if($user->level == "pelanggan") selected @endif>Pelanggan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password"  name="password" class="form-control" required="">
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
