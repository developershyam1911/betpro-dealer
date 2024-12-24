@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add New Client</h3>
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
                            <div class="card-title">Add New Client</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Client Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" placeholder="Enter Client image"
                                        class="form-control" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Username<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Username"
                                        class="form-control" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Fb Link (optional)</label>
                                    <input type="link" name="fb_link" id="fb_link" placeholder="Enter Fb Link"
                                        class="form-control" />
                                    @error('fb_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="insta_link">Insta Link (optional)</label>
                                    <input type="link" name="insta_link" id="insta_link" placeholder="Enter Insta Link"
                                        class="form-control" />
                                    @error('insta_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (optional)<span
                                            class="text-danger">*</span></span></label>
                                    <textarea name="description" id="description" placeholder="Client Details" class="form-control"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Add Client" class="btn btn-primary" />
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
@section('customJs')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('#title').change(function() {
            element = $(this);
            $.ajax({
                url: "{{ route('getSlug') }}",
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response['status']) {
                        $('#slug').val(response['slug'])
                    }
                }
            })
        });
    </script>
@endsection
