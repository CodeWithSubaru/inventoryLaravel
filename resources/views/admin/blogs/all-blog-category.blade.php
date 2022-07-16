@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">All Blog Categories</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($categories as $key => $category)
                                <tr>
                                    <!-- <td>{{ $i++ }}</td> -->
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.page.edit-blog-category', $category->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.page.delete-blog-category', $category->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
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