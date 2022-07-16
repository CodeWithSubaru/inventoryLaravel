@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Unit</h4>

                        <form method="post" action="{{ route('admin.unit.update') }}" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $unit->id }}">

                            <div class="col-12">

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" placeholder="ex. Felipe Doe" id="name" value="{{ $unit->name }}">
                                    </div>
                                </div>
                                <!-- end row -->

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