@extends('layouts.template')
@section('title')
Order
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Order Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nama</th>
                                                                <th>Price</th>
                                                                <th>Total</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($order as $row)
                                                            <td>{{ $loop->iteration + ($order->perpage() *  ($order->currentPage() -1)) }}</td>
                        <td>{{ $row->barang->nama}}</td>
                        <td> @currency($row->barang->harga)</td>
                        <td>{{ $row->harga }}</td>
                        <td>
                            <form method="post" action="{{ route('order.destroy',[$row->idorder]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->idorder}}?')">
                                @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm edit">
                                <i class="bi bi-trash3-fill"></i>
                            </button>


                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('order.edit',[$row->idorder]) }}" title="Edit">
                             <i class="bi bi-pencil-fill"></i>
                             </a>

                            </button>
                        </td>
                    </tr>
                </form>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $order->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
