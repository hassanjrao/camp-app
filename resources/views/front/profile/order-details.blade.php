@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ $order["order_id"] }} Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-item text-white active"><a class="text-white"
                                    href="{{ route('profile.index') }}">Orders</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <h4>Order Details</h4>
                    </div>

                    <div class="card-body">






                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Session</th>
                                    <th>Time Slot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($camps as $camp)
                                    @foreach ($camp['sessions'] as $session)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{{ count($camp['sessions']) }}">{{ $camp['name'] }}</td>
                                                <td rowspan="{{ count($camp['sessions']) }}">{{ $camp['price'] }}
                                                    {{ config('app.currency') }}</td>
                                            @endif
                                            <td>{{ $session['start_date'] }} - {{ $session['end_date'] }}</td>
                                            <td>
                                                @foreach ($session['slots'] as $slot)
                                                    <span wire:click="removeFromCart({{ $slot['id'] }})">
                                                        {{ $slot['start_time'] . '-' . $slot['end_time'] }}

                                                    </span>
                                                    <hr>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>




                    </div>

                </div>


            </div>



        </div>

    </div>


@endsection

@push('scripts')

@endpush
