@extends('layouts.backend')
@section('page-title', 'Camps')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex align-items-center">
                <h3 class="block-title">
                    Camps
                </h3>

                <a href="{{ route("admin.camps.create") }}" class="btn btn-primary push" >Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Min Age</th>
                                <th>Max Age</th>
                                <th>Price</th>
                                <th>Max Registration</th>
                                <th>Description</th>
                                <th>Total Sessions</th>
                                <th>Total Participants</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($camps as $ind => $camp)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $camp['name'] }}</td>
                                    <td>
                                        <img class="img-fluid" src="{{ $camp['camp_image'] }}" alt="">

                                    </td>
                                    <td>{{ $camp['min_age'] }}</td>
                                    <td>
                                        @if($camp['no_max_age'])
                                            No Limit
                                        @else
                                            {{ $camp['max_age'] }}
                                        @endif
                                    </td>
                                    <td>{{ $camp['price'] }}</td>
                                    <td>{{ $camp['max_registration'] }}</td>
                                    <td>{{ $camp['description'] }}</td>
                                    <td>{{ $camp['total_sessions'] }}</td>
                                    <td>{{ $camp['total_participants'] }}</td>


                                    <td>{{ $camp['created_at'] }}</td>
                                    <td>{{ $camp['updated_at'] }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.camps.sessions', $camp['id']) }}"
                                                class="btn btn-sm btn-alt-success">Sessions</a>
                                            <a href="{{ route('admin.camps.edit', $camp['id']) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $camp['id'] }}"
                                                action="{{ route('admin.camps.destroy', $camp['id']) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $camp['id'] }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade" id="modal-block-popin" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">

                <form action="{{ route('admin.camps.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>





                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
