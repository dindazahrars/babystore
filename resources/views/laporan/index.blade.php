@extends('layouts.template')
@section('title')
Laporan
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Laporan Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <a class="btn btn-info waves-effect waves-light" href="{{ route('laporan.create')}}" role="button"> Create (+)</a>
                                                </p>
                                                </div>

                                            <div class="card-block table-blaporan-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Transaksi</th>
                                                                <th>User</th>
                                                                <th>Tanggal Laporan</th>
                                                                <th>Total Laporan</th>
                                                                <th>Metode</th>


                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($laporan as $row)
                                                            <td>{{ $loop->iteration + ($laporan->perpage() *  ($laporan->currentPage() -1)) }}</td>
                        <td>{{ optional($row->transaksi)->status}}</td>
                        <td>{{ optional($row->user)->name}}</td>
                        <td>{{ $row->tgl_laporan }}</td>
                        <td>{{ $row->total_laporan}}</td>
                        <td>
                            <a class="ti-eye" href="{{ route('laporan.show',[$row->idt]) }}" title="Lihat">

                            </a>
                    </tr>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $laporan->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
