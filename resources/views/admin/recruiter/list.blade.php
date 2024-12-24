@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Recruiters List</h3>
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
                                <h4 class="card-title">Recruiters List</h4>
                            </div>
                          <div>
                            <a href="{{route('admin.recruiter.create')}}" class="btn btn-primary">Add Recruiter</a>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recruiters as $recruiter)
                                            <tr>
                                                <td>{{ $loop->iteration  }}</td>
                                                <td>{{ $recruiter->name }}</td>
                                                <td>{{ $recruiter->email }}</td>
                                                <td>{{ $recruiter->created_at }}</td>
                                                <td><a href="{{route('admin.recruiter.edit',$recruiter->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                                <td><a href="{{route('admin.recruiter.delete',$recruiter->id)}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger">Delete</a></td>
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
