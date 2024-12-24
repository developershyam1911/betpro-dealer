@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Price List</h3>
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
                            <h4 class="card-title">Price List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Field</th>
                                            <th>Price</th>
                                            <th>Approx Time</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prices as $price)
                                            <tr>
                                                <td>{{ $price->id }}</td>
                                                <td>{{ $price->field_type }}</td>
                                                <td>&#8377; {{ $price->price }}</td>
                                                <td>{{ $price->approx_time }} seconds</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Update</a>
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
