@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Manage Feedbit Value</h3>
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
                                <form action="{{ route('admin.feebit.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="number" class="form-control" id="value" name="value" 
                                               value="{{ $feedbit->value }}" step="0.1" required>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <a href="{{ route('admin.feedbit') }}" class="btn btn-secondary">Cancel</a>
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
                                                <th>Value</th>
                                                <td>{{ $feedbit->value }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <center>
                                    <a href="{{ route('admin.feedbit', ['mode' => 'edit']) }}" class="btn btn-primary btn-sm">Update Price</a>
                                </center>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
