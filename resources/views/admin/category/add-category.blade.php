@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Add Category</h4>
                            <a href="{{ route('admin.category.all') }}" class="btn btn-dark waves-effect waves-light">Back to All Category</a>
                        </div>

                        <form action="{{ route('admin.category.store') }}" method="post" id="addCategoryForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" name="name" placeholder="Please enter your name" id="name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Add category</button>
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