@extends('layouts.backend')

@php
    $addEdit = isset($session) ? 'Edit' : 'Add';
    $addUpdate = isset($session) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Session')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Session</h3>


                <a href="{{ route('admin.sessions.index') }}" class="btn btn-primary push">All sessions</a>


            </div>
            <div class="block-content">

                @if ($session)
                    <form action="{{ route('admin.sessions.update', $session->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.sessions.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">Camp <span class="text-danger">*</span></label>

                        <select required name="camp_id" id="camp_id" class="form-control">
                            <option value="">Select Camp</option>
                            @foreach ($camps as $camp)
                                <option value="{{ $camp->id }}"
                                    {{ $session && $session->camp_id == $camp->id ? 'selected' : null }}>
                                    {{ $camp->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-danger" id="name_error"></span>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">Start Date <span class="text-danger">*</span></label>
                        <input required type="date" value="{{ $session ? $session->start_date : null }}"
                            class="form-control" id="start_date" name="start_date" placeholder="Enter Min Age">
                        <span class="text-danger" id="start_date_error"></span>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">End Date <span class="text-danger">*</span></label>
                        <input required type="date" value="{{ $session ? $session->end_date : null }}"
                            class="form-control" id="end_date" name="end_date" placeholder="Enter Min Age">
                        <span class="text-danger" id="end_date_error"></span>
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
