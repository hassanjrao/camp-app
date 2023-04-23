@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content">
        <div class="row row-deck">

            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.camps.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $camps }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">camps</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fas fa-campground fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.camps.index') }}">
                                <span>View camps</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>

            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.sessions.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $sessions }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Sessions</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">


                                <i class="fas fa-lightbulb fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.sessions.index') }}">
                                <span>View Sessions</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>

            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.slots.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $slots }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Slots</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.slots.index') }}">
                                <span>View Slots</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>

            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.users.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $users }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Registered Users</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fa fa-2x fa-users text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.users.index') }}">
                                <span>View Users</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.orders.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $orders }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Orders</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fas fa-tags fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.orders.index') }}">
                                <span>View Orders</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>




        </div>
    </div>
    <!-- END Page Content -->
@endsection
