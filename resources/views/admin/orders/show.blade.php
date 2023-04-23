@extends('layouts.backend')

@section('page-title',  $order->order_id)
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $order->order_id }}</h3>

                <h3 class="block-title">
                    <a href="{{ route("admin.users.edit",["user"=>$order->user]) }}"> Participant: {{ $order->user->name }}</a>
                   </h3>

                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary push">All orders</a>


            </div>

            <div class="block-content">
                <div class="table-responsive">
                  <table class="table table-borderless table-striped table-vcenter fs-sm">
                    <thead>
                      <tr>
                        <th class="text-center" style="width: 100px;">Camp</th>
                        <th class="text-center" >Session</th>
                        <th class="text-center">Slot</th>
                        <th class="text-end">Price</th>

                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->items as $item)

                        <tr>
                            <td class="text-center"><a href="{{ route("admin.camps.edit",["camp"=>$item->campSession->camp]) }}"><strong>{{ $item->campSession->camp->name }}</strong></a></td>
                            <td  class="text-center"><a href="{{ route("admin.sessions.edit",["session"=>$item->campSession]) }}">{{ $item->campSession->session_id }}</a></td>
                            <td class="text-center"><a href="{{ route("admin.slots.edit",["slot"=>$item->campSessionSlot]) }}">{{ $item->campSessionSlot->start_time }} - {{ $item->campSessionSlot->end_time }}</a> </td>
                            <td class="text-end"> {{ $item->campSession->camp->price }} {{ config("app.currency") }}</td>

                          </tr>

                        @endforeach



                      <tr>
                        <td colspan="3" class="text-end"><strong>Total Price:</strong></td>
                        <td class="text-end">{{ $order->total_price }} {{ config("app.currency") }}</td>
                      </tr>
                      <tr class="table-success">
                        <td colspan="3" class="text-end"><strong>Total Paid:</strong></td>
                        <td class="text-end">{{ $order->total }} {{ config("app.currency") }}</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
