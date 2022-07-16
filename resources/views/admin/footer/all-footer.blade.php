@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">All Footer</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Number</th>
                                    <th>Short Description</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Copyright</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($footers as $portfolio)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $portfolio->name }}</td>
                                    <td>{{ $portfolio->title }}</td>
                                    <td><img src="{{ asset($portfolio->image ?? 'uploads/no_image.jpg') }}" alt="" style="width: 80px; height: 60px;"></td>
                                    <td>
                                        <a href="{{ route('admin.page.edit-portfolio.edit', $portfolio->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.page.delete-portfolio.delete', $portfolio->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
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