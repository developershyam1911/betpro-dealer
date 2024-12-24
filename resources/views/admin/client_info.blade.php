@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Client Profile</h3>
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
                            <h4 class="card-title">Client Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                          <table class="table">
                            <tr>
                                <th>Firm Name</th>
                                <td>{{$user->business_name}}</td>
                                <th>Name</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                                <th>Mobile Number</th>
                                <td>{{$user->mobno}}</td>
                            </tr>
                            <tr>
                                <th>GST No / Aadhar Number</th>
                                <td>{{$user->gst_no}}</td>
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
