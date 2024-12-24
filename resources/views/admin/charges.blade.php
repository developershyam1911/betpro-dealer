@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Manage Charges</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (request('mode') === 'edit')
                        {{-- Edit Mode: Show Form --}}
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.charges.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="platform_fee">Platform Fee (%)</label>
                                        <input type="number" class="form-control" id="platform_fee" name="platform_fee" 
                                               value="{{ $charge->platform_fee }}" step="0.1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="convenience_fee">Convenience Fee (%)</label>
                                        <input type="number" class="form-control" id="convenience_fee" name="convenience_fee" 
                                               value="{{ $charge->convenience_fee }}" step="0.1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gst">GST (%)</label>
                                        <input type="number" class="form-control" id="gst" name="gst" 
                                               value="{{ $charge->gst }}" step="0.1" required>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <a href="{{ route('admin.charges') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Default Mode: Show Table --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table">
                                        <tbody>
                                            <tr>
                                                <th>Platform Fee</th>
                                                <td>{{ $charge->platform_fee }} %</td>
                                            </tr>
                                            <tr>
                                                <th>Convenience Fee</th>
                                                <td>{{ $charge->convenience_fee }} %</td>
                                            </tr>
                                            <tr>
                                                <th>GST</th>
                                                <td>{{ $charge->gst }} %</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <center>
                                    <a href="{{ route('admin.charges', ['mode' => 'edit']) }}" class="btn btn-primary btn-sm">Update Price</a>
                                </center>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
