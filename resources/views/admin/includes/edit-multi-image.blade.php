@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Image</h4>

                        <form method="post" action="{{ route('admin.page.all-multi-image.update') }}" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $image->id }}">

                            <div class="row">
                                <div class="col-12">

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

                                            <img src="{{ asset($image->multi_image) }}" class="rounded" alt="200x200" width="200" data-holder-rendered="true" id="showImage">

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