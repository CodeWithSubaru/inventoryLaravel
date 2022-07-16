@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">All Units</h4>
                            <a href="{{ route('admin.unit.add') }}" class="btn btn-dark waves-effect waves-light">Add Unit</a>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($units as $key => $unit)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.unit.edit', $unit->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.unit.delete', $unit->id) }}" class="btn btn-danger" id="deleteMes"><i class="fas fa-trash-alt"></i></a>
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