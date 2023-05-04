@extends('layouts.backend')

@php
    $addEdit = isset($discount) ? 'Edit' : 'Add';
    $addUpdate = isset($discount) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Discount')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Discount</h3>


                <a href="{{ route('admin.discounts.index') }}" class="btn btn-primary push">All Discounts</a>


            </div>
            <div class="block-content">

                @if ($discount)
                    <form action="{{ route('admin.discounts.update', $discount->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.discounts.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Code <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $discount ? $discount->code : null }}"
                                    class="form-control" id="code" name="code" placeholder="Enter code">
                                <span class="text-danger" id="code_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Percentage <span
                                        class="text-danger">*</span></label>
                                <input required type="number" step=".01"
                                    value="{{ $discount ? $discount->discount_percentage : null }}" class="form-control"
                                    id="discount_percentage" min="0" name="percentage"
                                    placeholder="Enter Percentage">
                                <span class="text-danger" id="discount_percentage_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Start Date<span
                                        class="text-danger">*</span></label>
                                <input required type="date" value="{{ $discount ? $discount->start_date : null }}"
                                    class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date">
                                <span class="text-danger" id="start_date_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Start time<span
                                        class="text-danger">*</span></label>
                                <input required type="time" value="{{ $discount ? $discount->start_time : null }}"
                                    class="form-control" id="start_time" name="start_time" placeholder="Enter Start time">
                                <span class="text-danger" id="start_time_error"></span>
                            </div>

                        </div>
                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">End Date<span class="text-danger">*</span></label>
                                <input required type="date" value="{{ $discount ? $discount->end_date : null }}"
                                    class="form-control" id="end_date" name="end_date" placeholder="Enter End date">
                                <span class="text-danger" id="end_date_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">End Time<span class="text-danger">*</span></label>
                                <input required type="time" value="{{ $discount ? $discount->end_time : null }}"
                                    class="form-control" id="end_time" name="end_time" placeholder="Enter End  Time">
                                <span class="text-danger" id="end_time_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 mt-4">


                                <div class="form-check form-switch form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="active"
                                        {{ $discount && $discount->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editorAboutUs'))
            .catch(error => {
                console.error(error);
            });
    </script>



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
