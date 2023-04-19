@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Camps</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">Camps</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


        <!-- camps Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Camps</h6>
                    {{-- <h1 class="mb-5">Popular camps</h1> --}}
                </div>
                <div class="row g-4 justify-content-center">

                    @foreach ($camps as $camp)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="course-item bg-light">

                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('camp.show',["id"=>$camp['id'],"slug"=>$camp['slug']]) }}">
                                        <img class="img-fluid" src="{{ $camp['camp_image'] }}" alt="" style="height: 225px !important">
                                        <div
                                            class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">

                                                <a href="{{ route('camp.show',["id"=>$camp['id'],"slug"=>$camp['slug']]) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                                <a href="{{ route('login') }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>

                                        </div>
                                    </a>
                                </div>
                                <a href="{{ route('camp.show',["id"=>$camp['id'],"slug"=>$camp['slug']]) }}">
                                    <div class="text-center p-4 pb-0">

                                        <h5>{{ $camp['name'] }}</h5>

                                        <h6>{{ config("app.currency") }} {{ $camp['price'] }}</h6>

                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-user-tie text-primary me-2"></i>Age:
                                            {{ $camp['age_range'] }}</small>

                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-user text-primary me-2"></i>Sessions:
                                            {{ $camp['total_sessions'] }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- camps End -->


@endsection

@push('scripts')

@endpush
