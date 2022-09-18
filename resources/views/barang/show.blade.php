@extends('layouts.template')
@section('title')
Product
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
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Animal List Table</h4>

                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                            <tr>
                       <td>Product Id</td>

                       <td>{{ $product->id }}</td>

                       <tr>
                        <td>Product Name</td>

                        <td>{{ $product->nama }}</td>
                    </tr>
                   <tr>
                    <td>Images</td>
                    <img class="img-thumbnail" width="30%" src="{{asset('uploads/'.$product->foto)}}"/>
                    <td>{{$product->foto}}</td>
                   </tr>
                   <tr>
                       <td>Brand</td>

                       <td>{{$product->brand}}</td>
                   </tr>
                   <tr>
                       <td>Stock</td>

                       <td>{{$product->stock }}</td>
                   </tr>
                   <tr>
                       <td>Price</td>

                       <td>{{$product->harga}}</td>
                   </tr>
                                            </table>
                                            <a class="btn btn-primary waves-effect waves-light" href="/product" role="button">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
</div>
@endsection
