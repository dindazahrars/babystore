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
                                            <div class="ml-3">
                                                <a class="btn btn-info waves-effect waves-light" href="{{ route('order.create')}}" role="button"> Create (+)</a>
                                                </p>
                                                </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Product Name</th>
                                                                <th>Total</th>
                                                                <th>Price</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($order as $row)
                                                            <td>{{ $loop->iteration + ($order->perpage() *  ($order->currentPage() -1)) }}</td>
                        <td>{{ optional($row->product)->nama}}</td>
                        <td>{{ $row->total }}</td>
                        <td>{{ $row->harga}}</td>
                        <td>
                            <form method="post" action="{{ route('order.destroy',[$row->idorder]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->name}}?')">
                                @csrf
                            {{ method_field('DELETE') }}



                            <a class="ti-pencil" href="{{ route('order.edit',[$row->idorder]) }}" title="Edit">

                             </a>


                            <a class="ti-eye" href="{{ route('order.show',[$row->idorder]) }}" title="Lihat">

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
                                                        {{ $order->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
