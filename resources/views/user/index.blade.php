@extends('layouts.template')
@section('title')
Admin & Pelanggan
@endsection

<!-- ini untuk isi home -->
@section('content')
<div class="card">

                                            <div class="card-header">
                                                <h5>Admin & Pelangan Table</h5>
                                                <div class="card-header-right">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <a class="btn btn-info waves-effect waves-light" href="{{ route('user.create')}}" role="button"> Create (+)</a>
                                                </p>
                                                </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Level</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($user as $row)
                                                            <td>{{ $loop->iteration + ($user->perpage() *  ($user->currentPage() -1)) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->level }}</td>
                        <td>
                            <form method="post" action="{{ route('user.destroy',[$row->id]) }}" onsubmit="return confirm('Are you sure to delete, {{$row->name}}?')">
                                @csrf
                            {{ method_field('DELETE') }}



                            <a class="ti-pencil" href="{{ route('user.edit',[$row->id]) }}" title="Edit">

                             </a>


                            <a class="ti-eye" href="{{ route('user.show',[$row->id]) }}" title="Lihat">

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
                                                        {{ $user->appends(Request::all())->links() }}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
@endsection
