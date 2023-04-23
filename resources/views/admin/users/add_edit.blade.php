@extends('layouts.backend')

@php
    $addEdit = isset($user) ? 'Edit' : 'Add';
    $addUpdate = isset($user) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' User')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} User</h3>


                <a href="{{ route('admin.users.index') }}" class="btn btn-primary push">All Users</a>


            </div>
            <div class="block-content">

                @if ($user)
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $user ? $user->name : null }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                <span class="text-danger" id="name_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Email <span class="text-danger">*</span></label>
                                <input required type="email" value="{{ $user ? $user->email : null }}"
                                    class="form-control" id="email" name="email" placeholder="Enter Email">
                                <span class="text-danger" id="email_error"></span>
                            </div>



                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Address <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $user ? $user->address : null }}"
                                    class="form-control" id="address" name="address" placeholder="Enter Address">
                                <span class="text-danger" id="address_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Phone <span class="text-danger">*</span></label>
                                <input required type="tel" value="{{ $user ? $user->phone : null }}"
                                    class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                <span class="text-danger" id="price_error"></span>
                            </div>

                        </div>


                        <div class="row mb-4 justify-content-center">


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Emergency Contact Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $user ? $user->emergency_contact_name : null }}"
                                    class="form-control" id="emergency_contact_name" name="emergency_contact_name"
                                    placeholder="Enter Emergency Contact Name">
                                <span class="text-danger" id="emergency_contact_name_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Emergency Contact Phone <span
                                        class="text-danger">*</span></label>
                                <input required type="tel" value="{{ $user ? $user->emergency_contact_phone : null }}"
                                    class="form-control" id="emergency_contact_phone" name="emergency_contact_phone"
                                    placeholder="Enter Emergency Contact Phone">
                                <span class="text-danger" id="emergency_contact_phone_error"></span>
                            </div>



                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Age <span class="text-danger">*</span></label>
                                <input required type="number" min="0" value="{{ $user ? $user->age : null }}"
                                    class="form-control" id="age" name="age" placeholder="Enter age">
                                <span class="text-danger" id="age_error"></span>
                            </div>



                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Gender <span
                                        class="text-danger">*</span></label>


                                <select id="gender" class="form-select" name="gender">
                                    <option>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option selected value="not specified">Not Specified</option>
                                </select>

                                <span class="text-danger" id="gender_error"></span>
                            </div>


                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Parents Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $user ? $user->parents_name : null }}"
                                    class="form-control" id="parents_name" name="parents_name"
                                    placeholder="Enter Parents Name">
                                <span class="text-danger" id="parents_name_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Parents phone <span
                                        class="text-danger">*</span></label>
                                <input required type="tel" value="{{ $user ? $user->parents_phone : null }}"
                                    class="form-control" id="parents_phone" name="parents_phone"
                                    placeholder="Enter Parents phone">
                                <span class="text-danger" id="parents_phone_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Parents email <span
                                        class="text-danger">*</span></label>
                                <input required type="email" value="{{ $user ? $user->parents_email : null }}"
                                    class="form-control" id="parents_email" name="parents_email"
                                    placeholder="Enter Parents email">
                                <span class="text-danger" id="parents_email_error"></span>
                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Password <span
                                        class="text-danger">*</span></label>
                                <input required type="text" 
                                    class="form-control" id="password" name="password"
                                    placeholder="Enter Password">
                                <span class="text-danger" id="password_error"></span>
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
