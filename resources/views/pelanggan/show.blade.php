@extends('layouts.template')
@section('title')
Data Admin
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="main-content">
<div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Admin's Table</h4>

                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                            <tr>
                       <td>Admin Id</td>

                       <td>{{ $user->id }}</td>
                   </tr>
                   <tr>
                       <td>Name</td>

                       <td>{{ $user->name }}</td>
                   </tr>
                   <tr>
                       <td>Email</td>

                       <td>{{ $user->email }}</td>
                   </tr>
                   <tr>
                    <td>Level</td>

                    <td>{{ $user->level }}</td>
                </tr>
                                            </table>
                                            <a class="btn btn-primary waves-effect waves-light" href="/user" role="button">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
</div>
@endsection
