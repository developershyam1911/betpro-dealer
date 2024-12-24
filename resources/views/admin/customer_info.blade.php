@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Customer Profile</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                          <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$user->name}}</td>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{$user->mobno}}</td>
                                <th>Address</th>
                                <td>{{$user->address}}</td>
                            </tr>
                            <tr>
                                <th>Account Status</th>
                                <td>
                                    <button class="btn btn-sm {{$user->status == 'active' ? 'btn-success' : 'btn-danger'}}">{{$user->status}}</button>
                                </td>
                                <th>Account Creation Date & Time</th>
                                <td>{{$user->created_at}}</td>
                            </tr>
                          </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection