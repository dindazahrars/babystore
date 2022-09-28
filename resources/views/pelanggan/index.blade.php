@extends('layouts.template')
@section('title')
Pelanggan
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Pelanggan Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nama </th>
                                                                <th>Email</th>
                                                                <th>Level</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($datas as $row)
                                                            <td>{{ $loop->iteration + ($user->perpage() *  ($user->currentPage() -1)) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->level }}</td>
                        <td>
                            <form method="post" action="{{ route('user.destroy',[$row->id]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->name}}?')">
                                @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm edit">
                                <i class="bi bi-trash3-fill"></i>
                            </button>


                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('user.edit',[$row->id]) }}" title="Edit">
                             <i class="bi bi-pencil-fill"></i>
                             </a>


                            <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('user.show',[$row->id]) }}" title="Lihat">
                            <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
                </form>
                        </td>
                    </tr>
                    @endforeach
                                                        </tbody>
                                                        {{ $user->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
