@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Blog Category</h4>

                        <form method="post" action="{{ route('admin.page.update-blog-category', $category->id) }}">

                            @csrf

                            <div class="row">
                                <div class="col-12">

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" value="{{ $category->name }}" placeholder="ex. Name" id="example-text-input">
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