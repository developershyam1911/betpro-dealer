@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add Image</h3>
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
                            <div class="card-title">Add Image</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="image[]" class="form-control" multiple >
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                  </div>
                                <div class="card-action">
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Add Image" class="btn btn-primary" />
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
