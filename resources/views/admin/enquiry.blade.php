@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Enquiry</h3>
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
                            <h4 class="card-title">Enquiry</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Customer Info</th>
                                            <th>Shoot</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Info</th>
                                            <th>Shoot</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($enquiries as $enquiry)
                                            <tr>
                                                <td>{{ $enquiry->name }}<br>{{ $enquiry->mobno }}<br>{{ $enquiry->email }}</td>
                                                <td>{{ $enquiry->dress }}<br>{{ $enquiry->date }}</td>
                                                <td>{{ $enquiry->message }}</td>
                                                <td>{{ $enquiry->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('enquiry.delete', $enquiry->id) }}"
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
