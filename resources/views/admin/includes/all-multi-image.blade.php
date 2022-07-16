@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">All Multi Image</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($images as $image)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ asset($image->multi_image) }}" alt="" style="width: 160px; height: 120px;"></td>
                                    <td>
                                        <a href="{{ route('admin.page.all-multi-image.edit', $image->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.page.all-multi-image.destroy', $image->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
                                    </td>



                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>

@endsection