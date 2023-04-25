@extends('layouts.backend')

@php
    $addEdit = isset($slot) ? 'Edit' : 'Add';
    $addUpdate = isset($slot) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Slot')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Slot</h3>


                <a href="{{ route('admin.slots.index') }}" class="btn btn-primary push">All Slots</a>


            </div>
            <div class="block-content">

                @if ($slot)
                    <form action="{{ route('admin.slots.update', $slot->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.slots.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">Camp <span class="text-danger">*</span></label>

                        <select required name="camp_id" id="camp_id" class="form-control" onchange="campSelected(this)">
                            <option value="">Select Camp</option>
                            @foreach ($camps as $camp)
                                <option value="{{ $camp->id }}"
                                    {{ $slot && $slot->campSession->camp->id == $camp->id ? 'selected' : null }}>
                                    {{ $camp->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-danger" id="name_error"></span>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">Session <span class="text-danger">*</span></label>

                        <select required name="session_id" id="session_id" class="form-control">
                            @if (!$slot)
                                <option value="">Select Camp First</option>
                            @endif
                            @foreach ($sessions as $session)
                                <option value="{{ $session->id }}"
                                    {{ $slot && $slot->session_id == $session->id ? 'selected' : null }}>
                                    {{ $session->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-danger" id="name_error"></span>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">Start time <span class="text-danger">*</span></label>
                        <input required type="time" value="{{ $slot ? $slot->start_time : null }}" class="form-control"
                            id="start_time" name="start_time">
                        <span class="text-danger" id="start_time_error"></span>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label class="form-label" for="label">End time <span class="text-danger">*</span></label>
                        <input required type="time" value="{{ $slot ? $slot->end_time : null }}" class="form-control"
                            id="end_time" name="end_time">
                        <span class="text-danger" id="end_time_error"></span>
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
        function campSelected(e) {
            console.log(e.value);

            camp_id = e.value;

            $.ajax({
                url: "{{ route('admin.slots.camp.sessions') }}",
                type: "POST",
                data: {
                    camp_id: camp_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {

                    let sessions = data.data.sessions;

                    let html = '<option value="">Select Session</option>';

                    sessions.forEach(session => {
                        html += `<option value="${session.id}"> ${session.name}</option>`;
                    });

                    $('#session_id').html(html);

                },
                error: function(data) {
                    console.log(data);
                }
            });

        }
    </script>

@endsection
