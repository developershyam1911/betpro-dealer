@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Client List</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Client List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Coin</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->mobno }}</td>
                                                <td><i class="fa fa-coins text-warning"></i> {{ intval($client->balance)  }}</td>
                                                <td>{{ $client->created_at }}</td>
                                                <td>
                                                    @if ($client->status == 'active')
                                                        <button class="btn btn-sm btn-success">
                                                            {{ $client->status }}</button>
                                                    @else
                                                    <a href="{{route('admin.active.client',$client->id)}}" onclick="return confirm('Are you sure want to activate this account?')" class="btn btn-sm btn-danger">{{ $client->status }}</a>
                                                    @endif


                                                </td>
                                                <td>
                                                    <a href="{{route('admin.client.info',$client->id)}}" class="btn btn-primary btn-sm">View</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.client.remove',$client->id)}}"
                                                        onclick="return confirm('Are you sure want to delete?')"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
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
