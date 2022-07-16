@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">

                            <img src="{{ url((!empty(Auth::user()->profile_image)) ? 'uploads/admin_img/' . Auth::user()->profile_image : 'uploads/admin_img/no_image.jpg') }}" class="img-thumbnail rounded-circle avatar-xl" alt="">

                        </div>
                        <dl class="row mb-0">
                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">{{ Str::headline(Auth::user()->name) }}</dd><!-- Access Mutator to be uppercase -->

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ Auth::user()->email }}</dd>
                            <dt class="col-sm-3">Username</dt>
                            <dd class="col-sm-9">{{ Auth::user()->username }}</dd>
                        </dl>
                        <div class="text-center">
                            <button class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editProfile{{ Auth::user()->id }}">Edit</button>
                        </div>

                        <!-- Start of Modal -->

                        <div class="modal fade" id="editProfile{{ Auth::user()->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <form method="post" action="{{ route('admin.profile.store') }}" class="modal-content" enctype="multipart/form-data">

                                    @csrf

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="ex. Felipe Doe" id="example-text-input">
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="ex. sample02@gmail.com" id="example-text-input">
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="username" value="{{ Auth::user()->username }}" placeholder="ex. Doe23" id="example-text-input">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="profile_img" id="image" placeholder="ex. Doe23">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <img src="{{ url((!empty(Auth::user()->profile_image)) ? 'uploads/admin_img/' . Auth::user()->profile_image : 'uploads/admin_img/no_image.jpg') }}" class="rounded" alt="200x200" width="200" id="showImage" data-holder-rendered="true">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end col -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Toogle to second dialog -->
                                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal"> Close </button>
                                        <button type="submit" class="btn btn-primary"> Save </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- End of Modal -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection