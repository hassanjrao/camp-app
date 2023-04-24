@extends('layouts.backend')

@php
    $addEdit = isset($carousal) ? 'Edit' : 'Add';
    $addUpdate = isset($carousal) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' carousal')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Carousal</h3>

            </div>
            <div class="block-content">

                @if ($carousal)
                    <form action="{{ route('admin.carousals.update', $carousal->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.carousals.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="form-label" for="label">Title <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $carousal ? $carousal->title : null }}"
                                    class="form-control" id="title" name="title" placeholder="Enter title">
                                <span class="text-danger" id="title_error"></span>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="form-label" for="label">Sub Title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $carousal ? $carousal->subtitle : null }}"
                                    class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                                <span class="text-danger" id="subtitle_error"></span>
                            </div>







                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="form-label" for="label">Description <span
                                        class="text-danger">*</span></label>

                                <textarea required class="form-control" name="description" id="description" cols="30" rows="2">{{ $carousal ? $carousal->description : '' }}</textarea>
                                <span class="text-danger" id="description_error"></span>
                            </div>

                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                @if ($carousal && $carousal->image)
                                    <img src="{{ asset('storage/'.$carousal->image) }}" alt="carousal Image" width="100%">
                                    <br>
                                @endif

                                <label class="form-label" for="label">Image <span class="text-danger"></span></label>
                                <input  type="file" class="form-control" id="image" name="image"
                                    placeholder="Enter image">
                                <span class="text-danger" id="image_error"></span>
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
