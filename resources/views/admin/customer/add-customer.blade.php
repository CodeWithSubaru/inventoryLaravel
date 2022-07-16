@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Add Customer</h4>
                            <a href="{{ route('admin.customer.all') }}" class="btn btn-dark waves-effect waves-light">Back to All Customer</a>
                        </div>

                        <form action="{{ route('admin.customer.store') }}" method="post" id="addCustomerForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" name="name" placeholder="ex. Felipe Doe" id="name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="mobile_no" class="col-sm-2 col-form-label">Mobile Number</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="number" name="mobile_no" placeholder="ex. 09232421232" id="mobile_no">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control " type="email" name="email" placeholder="ex. example@sample.com" id="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" name="address" placeholder="Enter your address" id="address">
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

                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Add customer</button>
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