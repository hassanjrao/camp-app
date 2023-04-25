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

                            <li class="breadcrumb-item text-white active"><a class="text-white"
                                    href="{{ route('camp.index') }}">Camps</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $camp->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl py-5">
        <div class="container">


            @foreach ($campSessions as $session)
                <div class="text-center wow fadeInUp mb-2" data-wow-delay="0.1s">
                    <h4 class="section-title bg-white text-center text-primary px-3"> Session {{ $session["name"] }} From
                        {{ $session['start_date'] }} to {{ $session['end_date'] }}</h4>
                </div>
                <div class="row g-4 justify-content-center mb-4">

                    @foreach ($session['session_slots'] as $ind => $slot)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item text-center pt-3">
                                <div class="p-4">
                                    <h5 class="mb-3">Slot #{{ ++$ind }}</h5>
                                    <i class="fa fa-2x fa-calendar text-primary mb-4"></i>
                                    <h6 class="mb-3">{{ $slot['start_time'] }} to {{ $slot['end_time'] }}</h6>

                                    <div class="w-100 d-flex justify-content-center">

                                        {{-- check if the slot is already added to cart using the slot id in session --}}

                                        @if (session()->has('cart') && isset(session('cart')['slots']) && in_array($slot['id'], session('cart')['slots']))
                                            <button type="button" onclick="removeFromCart({{ $slot['id'] }},this)"
                                                class="flex-shrink-0 btn btn btn-danger px-3"
                                                style="border-radius: 30px 30px 30px 30px;">
                                                Added to cart <i class="fa fa-trash"></i>
                                            </button>
                                        @else
                                            <button type="button" onclick="addToCart({{ $slot['id'] }},this)"
                                                class="flex-shrink-0 btn btn btn-success px-3"
                                                style="border-radius: 30px 30px 30px 30px;">
                                                Add to cart <i class="fa fa-cart-plus"></i>
                                            </button>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
                <br><br>
            @endforeach

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function addToCart(slot_id, e) {


            // disable the button
            e.classList.remove('btn-success');
            e.classList.add('btn-danger');
            e.innerHTML = "Added to cart <i class='fa fa-trash'></i>";
            // add method to remove from cart
            e.setAttribute('onclick', 'removeFromCart(' + slot_id + ',this)');


            let cartHeaderValue = $("#cartHiddenField").val();
            //    convert to integer
            cartHeaderValue = parseInt(cartHeaderValue);
            //    increment the value
            cartHeaderValue = cartHeaderValue + 1;

            //    update the hidden field
            $("#cartHiddenField").val(cartHeaderValue);

            $("#cartHeaderIcon").html("Cart (" + cartHeaderValue + ")");


            $.ajax({
                url: "{{ route('carts.add') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "slot_id": slot_id
                },
                success: function(response) {
                    console.log(response);

                    confirmDialog(response.message, 'Checkout', 'Add More')
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('carts.index') }}";
                            }
                        })
                },
                error: function(response) {
                    console.log(response);

                    showStatus(response.message, 'error', false);
                }
            });

        }

        function removeFromCart(slot_id, e) {

            // disable the button
            e.classList.remove('btn-danger');
            e.classList.add('btn-success');
            e.innerHTML = "Add to cart <i class='fa fa-cart-plus'></i>";
            // add method to remove from cart
            e.setAttribute('onclick', 'addToCart(' + slot_id + ',this)');

            let cartHeaderValue = $("#cartHiddenField").val();
            //    convert to integer
            cartHeaderValue = parseInt(cartHeaderValue);
            //    decrement the value
            cartHeaderValue = cartHeaderValue - 1;

            //    update the hidden field
            $("#cartHiddenField").val(cartHeaderValue);

            $("#cartHeaderIcon").html("Cart (" + cartHeaderValue + ")");

            $.ajax({
                url: "{{ route('carts.remove') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "slot_id": slot_id
                },
                success: function(response) {
                    console.log(response);

                    showStatus(response.message, 'success', false);
                },
                error: function(response) {
                    console.log(response);

                    showStatus(response.message, 'error', false);
                }
            });

        }

    </script>
@endpush
