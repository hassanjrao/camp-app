@extends('layouts.backend')

@php
    $addEdit = isset($camp) ? 'Edit' : 'Add';
    $addUpdate = isset($camp) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Camp')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Camp</h3>


                <a href="{{ route('admin.camps.index') }}" class="btn btn-primary push">All Camps</a>


            </div>
            <div class="block-content">

                @if ($camp)
                    <form action="{{ route('admin.camps.update', $camp->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.camps.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $camp ? $camp->name : null }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                <span class="text-danger" id="name_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Min Age <span class="text-danger">*</span></label>
                                <input required type="number" value="{{ $camp ? $camp->min_age : null }}"
                                    class="form-control" id="min_age" min="0" name="min_age"
                                    placeholder="Enter Min Age">
                                <span class="text-danger" id="min_age_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" onchange="maxAgeLimitChange(this)" type="checkbox"
                                         id="no_max_age" name="no_max_age" {{ $camp && $camp->no_max_age ? 'checked' : '' }}>
                                    <label class="form-check-label" for="no_max_age">No Max Age Limit</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Max Age <span class="text-danger">*</span></label>
                                <input required {{ $camp && $camp->no_max_age ? 'disabled' : '' }} type="number" min="0"
                                    value="{{ $camp ? $camp->max_age : null }}" class="form-control" id="max_age"
                                    name="max_age" placeholder="Enter max Age">
                                <span class="text-danger" id="max_age_error"></span>
                            </div>

                        </div>


                        <div class="row mb-4">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Price <span class="text-danger">*</span></label>
                                <input required type="number" step="0.01" min="0"
                                    value="{{ $camp ? $camp->price : null }}" class="form-control" id="price"
                                    name="price" placeholder="Enter Price">
                                <span class="text-danger" id="price_error"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Max Registration <span
                                        class="text-danger">*</span></label>
                                <input required type="number" step="0.01" min="0"
                                    value="{{ $camp ? $camp->max_registration : null }}" class="form-control"
                                    id="max_registration" name="max_registration" placeholder="Enter max_registration">
                                <span class="text-danger" id="max_registration_error"></span>
                            </div>

                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="form-label" for="label">Description <span
                                        class="text-danger">*</span></label>

                                <textarea required class="form-control" name="description" id="description" cols="30"
                                    rows="2">{{ $camp ? $camp->description : '' }}</textarea>
                                <span class="text-danger" id="description_error"></span>
                            </div>

                        </div>


                    </div>


                </div>

                <div class="d-flex justify-content-end mb-4">

                    <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script>
        function maxAgeLimitChange(e) {
            if (e.checked) {
                $('#max_age').attr('disabled', true);
            } else {
                $('#max_age').attr('disabled', false);
            }
        }
    </script>

@endsection
