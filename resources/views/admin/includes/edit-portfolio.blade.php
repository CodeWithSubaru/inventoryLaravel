@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Portfolio</h4>

                        <form method="post" action="{{ route('admin.page.update-portfolio.update', $portfolio->id) }}" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $portfolio->id }}">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" value="{{ $portfolio->name }}" placeholder="ex. Name" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="title" value="{{ $portfolio->title }}" placeholder="ex. Title" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" id="elm1">{{ $portfolio->description }}</textarea>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">

                                            <img src="{{ asset($portfolio->image ?? 'uploads/no_image.jpg') }}" class="rounded" alt="200x200" width="200" height="150" data-holder-rendered="true" id="showImage">

                                        </div>
                                    </div>

                                </div>
                                <!-- end col -->
                            </div>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </form>
                    </div>



                </div>
            </div>
        </div>

    </div>
</div>


@endsection