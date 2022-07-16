@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Customer</h4>

                        <form method="post" action="{{ route('admin.customer.update') }}" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $customer->id }}">

                            <div class="col-12">

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" placeholder="ex. Felipe Doe" id="name" value="{{ $customer->name }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Mobile Number</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="number" name="mobile_no" placeholder="ex. 09232421232" id="mobile_no" value="{{ $customer->mobile_no }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control " type="email" name="email" placeholder="ex. example@sample.com" id="email" value="{{ $customer->email }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="address" placeholder="Enter your address" id="address" value="{{ $customer->address }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="file" name="image" id="image" placeholder="ex. Doe23">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset($customer->image ?? 'uploads/no_image.jpg') }}" class="rounded" alt="200x200" width="100" id="showImage" data-holder-rendered="true">
                                    </div>
                                </div>

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