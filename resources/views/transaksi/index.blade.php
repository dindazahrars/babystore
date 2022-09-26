@extends('layouts.template')
@section('title')
Transaksi
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Transaksi Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <a class="btn btn-info waves-effect waves-light" href="{{route('transaksi.create')}}" role="button"> Create (+)</a>
                                                </div>

                                            <div class="card-block table-btransaksi-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nama</th>
                                                                <th>Harga</th>
                                                                <th>Status</th>
                                                                <th>Metode</th>


                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($transaksi as $row)
                                                            <td>{{ $loop->iteration + ($transaksi->perpage() *  ($transaksi->currentPage() -1)) }}</td>
                                                            <td>{{ optional($row->user)->name}}</td>
                                                            <td>{{ optional($row->order)->harga}}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->metode}}</td>
                        <td>
                    </tr>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $transaksi->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
