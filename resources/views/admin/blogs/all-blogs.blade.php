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
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->tags }}</td>
                                    <td><img src="{{ asset($blog->image) }}" alt="" style="width:60px; height: 50px;"></td>
                                    <td>
                                        <a href="{{ route('admin.page.edit-blogs', $blog->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.page.delete-blogs', $blog->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
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