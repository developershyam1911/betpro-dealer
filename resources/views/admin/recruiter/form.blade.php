@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add Recruiter</h3>
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
                            <div class="card-title">Add Recruiter</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.recruiter.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name"
                                        class="form-control" value="{{old('name')}}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="Enter Email"
                                        class="form-control"  value="{{old('email')}}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="Password" placeholder="Create Password"
                                        class="form-control" value="{{old('password')}}" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Password">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="Password" placeholder="Confirm Password"
                                        class="form-control" />
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Add Recruiter" class="btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
