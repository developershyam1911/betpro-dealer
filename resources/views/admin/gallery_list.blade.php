@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Gallery List</h3>
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
                            <h4 class="card-title">Gallery List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($gallery as $key)
                                            <tr>
                                                <td><img src="{{ asset('uploads/' . $key->image) }}" alt=""
                                                        style="height: 50px;width:70px;border-radius:10px;"></td>
                                                <td>{{ $key->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('gallery.edit', $key->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('gallery.delete', $key->id) }}"
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
