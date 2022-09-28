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
                                                <a class="btn btn-info waves-effect waves-light" href="{{ route('barang.create')}}" role="button"> Create (+)</a>
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
                                                                <th>Harga</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($barang as $row)
                                                            <td>{{ $loop->iteration + ($barang->perpage() *  ($barang->currentPage() -1)) }}</td>
                        <td>{{ $row->nama }}</td>
                        <td><img class="img-thumbnail" src="{{asset('uploads/'.$row->foto)}}"/></td>
                        <td>{{ $row->brand }}</td>
                        <td>{{ $row->desc }}</td>
                        <td>{{ $row->stock }}</td>
                        <td> @currency($row->harga)</td>
                        <td>
                            <form method="post" action="{{ route('barang.destroy',[$row->id]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->nama}}?')">
                                @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm edit">
                                <i class="bi bi-trash3-fill"></i>
                            </button>


                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('barang.edit',[$row->id]) }}" title="Edit">
                             <i class="bi bi-pencil-fill"></i>
                             </a>


                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('barang.show',[$row->id]) }}" title="Lihat">
                            <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
                </form>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $barang->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
