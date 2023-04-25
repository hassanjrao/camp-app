@extends('layouts.backend')

@php
    $addEdit = isset($aboutUs) ? 'Edit' : 'Add';
    $addUpdate = isset($aboutUs) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' aboutUs')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} About Us</h3>

            </div>
            <div class="block-content">

                @if ($aboutUs)
                    <form action="{{ route('admin.about-us.update', $aboutUs->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-12 ">
                                <label class="form-label" for="label">Video</label>
                                <input required name="video_link" id="video_link" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="row mb-4">

                            <div class="col-lg-12 ">
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="editorAboutUs" class="form-control" cols="30" rows="50">{{ $aboutUs && $aboutUs->description ? $aboutUs->description : '' }}</textarea>
                            </div>
                        </div>




                        {{-- <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                @if ($aboutUs && $aboutUs->image)
                                    <img src="{{ asset('storage/'.$aboutUs->image) }}" alt="aboutUs Image" width="100%">
                                    <br>
                                @endif

                                <label class="form-label" for="label">Image <span class="text-danger"></span></label>
                                <input  type="file" class="form-control" id="image" name="image"
                                    placeholder="Enter image">
                                <span class="text-danger" id="image_error"></span>
                            </div>


                        </div> --}}





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



@endsection
