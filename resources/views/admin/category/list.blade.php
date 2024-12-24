@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Game List</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Game List</h4>
                            </div>
                          <div>
                            <a href="{{route('category.create')}}" class="btn btn-primary">Add New Game</a>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Created At</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($games as $game)
                                            <tr>
                                                <td>{{ $loop->iteration  }}</td>
                                                <td>{{ $game->name }}</td>
                                                <td><img src="{{ $game->logo }}" style="height: 100px; width:100px; border-radius:10px"></td>
                                                <td>{{ $game->created_at }}</td>
                                                {{-- <td><a href="{{route('admin.game.edit',$game->id)}}" class="btn btn-sm btn-primary">Edit</a></td> --}}
                                                <td><a href="{{route('category.delete',$game->id)}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
