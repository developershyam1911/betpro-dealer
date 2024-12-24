@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add Blog</h3>
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
                            <div class="card-title">Add Blog</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Blog Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" placeholder="Enter Blog image"
                                        class="form-control" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Blog Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" placeholder="Enter Blog Title"
                                        class="form-control" />
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" id="slug" placeholder="Blog Slug"
                                        class="form-control" readonly/>
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords <span class="text-danger">*</span> <span
                                            class="text-warning">(Keywords are separated by Comma)</span></label>
                                    <input type="text" name="keywords" id="keywords" placeholder="Blog Keywords"
                                        class="form-control" />
                                    @error('keywords')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description <span
                                            class="text-danger">*</span></span></label>
                                    <textarea name="meta_description" id="meta_description" placeholder="Meta Description" class="form-control"></textarea>
                                    @error('meta_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" placeholder="Blog Description" class="form-control"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Add Blog" class="btn btn-primary" />
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
