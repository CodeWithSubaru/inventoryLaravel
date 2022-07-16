@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit Footer Setup</h4>

                        <form action="{{ route('admin.page.update-footer', $footer->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('number') is-invalid @enderror" type="text" name="number" value="{{ $footer->number ?? '' }}" id="example-text-input">
                                    @error('number')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('short_description') is-invalid @enderror" type="text" name="short_description" value="{{ $footer->short_description ?? '' }}" id="example-text-input">
                                    @error('short_description')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Address </label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $footer->address ?? '' }}" id="example-text-input">
                                    @error('address')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Email </label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $footer->email ?? ''}}" id="example-text-input">
                                    @error('email')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Facebook </label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('facebook') is-invalid @enderror" type="url" name="facebook" value="{{ $footer->facebook ?? '' }}" id="example-text-input">
                                    @error('facebook')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Twitter </label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('twitter') is-invalid @enderror" type="url" name="twitter" value="{{ $footer->twitter ?? '' }}" id="example-text-input">
                                    @error('twitter')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Copyright </label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('copyright') is-invalid @enderror" type="text" name="copyright" value="{{ $footer->copyright ?? '' }}" id="example-text-input">
                                    @error('copyright')
                                    <div class=""><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div for="example-text-input" class="col-sm-2 col-form-label">
                                    <button class="btn btn-info waves-effect waves-light">Edit Footer</button>
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