@extends('layouts.frontend')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" style="height: 600px">
                <img class="img-fluid" src="{{ asset('storage/'.$carousal->image) }}"alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{ $carousal->subtitle }}</h5>
                                <h1 class="display-3 text-white animated slideInDown">{{ $carousal->title }}</h1>
                                <p class="fs-5 text-white mb-4 pb-2">{{ $carousal->description }}</p>
                                <a href="{{ route("camp.index") }}" class="btn btn-light text-primary py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->








    <!-- About Start -->
    <div class="container-xxl py-5" id="about-us">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        {{-- <iframe width="420" height="345" src="">
                        </iframe> --}}

                        <video  controls class="w-100" style="height: 550px">
                            <source src="{{ asset("storage/".$aboutUs->video_link) }}" type="video/mp4">
                            {{-- <source src="mov_bbb.ogg" type="video/ogg"> --}}
                            Your browser does not support HTML video.
                          </video>


                        {{-- <iframe width="560" height="315" src="{{ $aboutUs->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}

                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <p class="mb-4">
                        {!! $aboutUs->description !!}
                    </p>

                    {{-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


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
                                        <img class="img-fluid" src="{{ $camp['camp_image'] }}" alt="" style="height: 225px !important; width:100% !important;">
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
