<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @yield('page-title') {{ config('app.name') }}
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front-assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front-assets/css/style.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireStyles
</head>



<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">

            <h2 class="m-0 text-primary">
                <img src="{{ asset("front-assets/img/logo.png") }}" alt="" class="img-fluid" style="width:4.4rem">
                {{ config('app.name') }}</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ request()->segment(1) == '' ? ' active' : '' }}">Home</a>

                <a href="#about-us"
                    class="nav-item nav-link">About Us</a>


                <a href="{{ route('carts.index') }}" id="cartHeaderIcon"
                    class="nav-item nav-link {{ request()->segment(1) == 'carts' ? ' active' : '' }}">
                    Cart
                    ({{ session()->has('cart') && isset(session('cart')['slots']) ? count(session('cart')['slots']) : '0' }})
                </a>

                <input type="hidden" id="cartHiddenField"
                    value="{{ session()->has('cart') && isset(session('cart')['slots']) ? count(session('cart')['slots']) : 0 }}">

                {{--
                <a href="about.html" class="nav-item nav-link"
                    {{ request()->segment(1) == 'about' ? ' active' : '' }}>About</a> --}}
                <a href="{{ route('camp.index') }}"
                    class="nav-item nav-link {{ request()->segment(1) == 'camps' ? ' active' : '' }}">Camps</a>

                {{-- <a href="contact.html"
                    class="nav-item nav-link {{ request()->segment(2) == 'contact' ? ' active' : '' }}">Contact</a> --}}


                @if (Auth::check())
                    <a href="{{ route('profile.index') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'profile' ? ' active' : '' }}">Profile</a>
                @else
                    <a href="{{ route('login') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'login' || request()->segment(1) == 'register' ? ' active' : '' }}">Join
                        Now</a>
                @endif
                @if (Auth::check())
                    <a class="nav-item nav-link" style="cursor: pointer"
                        onclick="document.getElementById('logout-form').submit()">Logout</a>

                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf

                    </form>
                @endif

            </div>
            {{-- check if login --}}


        </div>
    </nav>
    <!-- Navbar End -->


    {{-- main content starts --}}

    @yield('content')


    {{-- main content ends --}}

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-around">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="#about-us">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>1021 Shrewsbury Avenue,Suite 1023</p>

                    <p class="mb-2"><i class="fa fa-globe me-3"></i> Shrewsbury, New Jersey, 07701</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> [201-783-3050] (tel: 201-783-3050)</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://twitter.com/yagaskilz?s=11&t=tFScwJTpRsaGLelgLpLHMQ"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://m.facebook.com/people/Yagaskilz-Sports-Development/100063665556389/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://instagram.com/yagaskilz?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a>
                        {{-- <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a> --}}
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ route('home') }}">{{ config('app.name') }}</a>, All
                        Right Reserved.


                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front-assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>

    @livewireScripts

    <script>
        function showStatus(message, type = 'success', toast = true) {



            if (type == "success") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                if (toast) {
                    Toast.fire({
                        icon: type,
                        title: message,
                    })
                } else {
                    Swal.fire({
                        icon: type,
                        title: message,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    })
                }
            } else if (type == "error") {

                Swal.fire({
                    icon: type,
                    title: message,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                })


            }

        }



        window.addEventListener('show-status', event => {

            showStatus(event.detail.message, event.detail.type, event.detail.toast)
        })


        function confirmDialog(message, confirmButtonText = 'Yes', cancelButtonText = 'No', type = 'success') {
            return Swal.fire({
                title: message,
                icon: type,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: confirmButtonText,
                confirmButtonAriaLabel: confirmButtonText,
                cancelButtonText: cancelButtonText,
                cancelButtonAriaLabel: cancelButtonText,
            })
        }
    </script>

    @stack('scripts')

</body>




</html>
