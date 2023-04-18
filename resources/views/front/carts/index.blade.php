@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Cart</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">


                            <li class="breadcrumb-item text-white active" aria-current="page">{{ "Cart" }}</li>
                        </ol>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <livewire:cart.carts>

@endsection

@push('scripts')

@endpush
