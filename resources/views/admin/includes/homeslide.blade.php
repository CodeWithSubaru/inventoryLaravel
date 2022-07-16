@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Home Slider Setup</h4>

                        <form action="{{ route('admin.page.home-slide.update') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $homeslide->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{ $homeslide->title }}" placeholder="ex. Felipe Doe" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="short_title" value="{{ $homeslide->short_title }}" placeholder="ex. sample02@gmail.com" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="video_url" value="{{ $homeslide->video_url }}" placeholder="ex. https://www.youtube.com/" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="home_slide_image" id="image" placeholder="ex. Doe23">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ url((!empty($homeslide->home_slide)) ? 'uploads/home_slide/' . $homeslide->home_slide : 'uploads/admin_img/no_image.jpg') }}" class="rounded" alt="200x200" width="100" id="showImage" data-holder-rendered="true">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Update</button>
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