@extends('layouts.template')
@section('title')
Product
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Product Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <a class="btn btn-info waves-effect waves-light" href="{{ route('product.create')}}" role="button"> Create (+)</a>
                                                </p>
                                                </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th width="10%">Images</th>
                                                                <th>Brand</th>
                                                                <th>Desc</th>
                                                                <th>Stock</th>
                                                                <th>Price</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($product as $row)
                                                            <td>{{ $loop->iteration + ($product->perpage() *  ($product->currentPage() -1)) }}</td>
                        <td>{{ $row->nama }}</td>
                        <td><img class="img-thumbnail" src="{{asset('uploads/'.$row->foto)}}"/></td>
                        <td>{{ $row->brand }}</td>
                        <td>{{ $row->desc }}</td>
                        <td>{{ $row->stock }}</td>
                        <td>{{ $row->harga }}</td>
                        <td>
                            <form method="post" action="{{ route('product.destroy',[$row->id]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->name}}?')">
                                @csrf
                            {{ method_field('DELETE') }}



                            <a class="ti-pencil" href="{{ route('product.edit',[$row->id]) }}" title="Edit">

                             </a>


                            <a class="ti-eye" href="{{ route('product.show',[$row->id]) }}" title="Lihat">

                             </a>
                             <button type="submit" href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm edit">
                                <i class="fa fa-trash close-card"></i>
                            </button>
                        </td>
                    </tr>
                </form>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $product->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
