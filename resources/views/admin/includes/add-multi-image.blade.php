@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Add Multi-Image Setup</h4>

                        <form action="{{ route('admin.page.add-multi-image.store') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image/s</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="multi_image[]" placeholder="ex. Felipe Doe" id="image" multiple>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ url((!empty($multi_image->home_slide)) ? 'uploads/home_slide/' . $multi_image->home_slide : 'uploads/admin_img/no_image.jpg') }}" class="rounded" alt="200x200" width="100" id="showImage" data-holder-rendered="true">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Add Multi-Image</button>
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