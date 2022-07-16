@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">All supplier</h4>
                            <a href="{{ route('admin.supplier.add') }}" class="btn btn-dark waves-effect waves-light">Add Supplier</a>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($suppliers as $key => $supplier)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->mobile_no }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.supplier.edit', $supplier->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.supplier.delete', $supplier->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
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