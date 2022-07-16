@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Add Portfolio Setup</h4>

                        <form action="{{ route('admin.page.store-blogs') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select select2 @error('blog_category_id') is-invalid @enderror" name="blog_category_id" id="validationServer04" aria-describedby="validationServer04Feedback">
                                        <option selected value="">Select Category Name</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="ex. sample02@gmail.com" id="example-text-input">
                                    @error('title')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('tags') is-invalid @enderror" type="text" name="tags" data-role="tagsinput" id="example-text-input">
                                    @error('tags')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description" placeholder="Enter your Description" class="@error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('description') is-invalid @enderror " type="file" name="image" id="image" placeholder="ex. Doe23">
                                    @error('image')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($blog->image ?? 'uploads/no_image.jpg') }}" class="rounded" alt="200x200" width="100" id="showImage" data-holder-rendered="true">
                                </div>
                            </div>

                            <!-- end row -->

                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Add Portfolio</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection