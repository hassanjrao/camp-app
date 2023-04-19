<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Orders') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Total Slots</th>
                                            <th>Order Status</th>
                                            <th>Order Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order["order_id"] }}</td>
                                                <td>{{ $order["created_at"] }}</td>
                                                <td>{{ count($order["items"]) }}</td>
                                                <td>{{ $order["status"] }}</td>
                                                <td>{{ $order["total"] }}</td>
                                                <td>
                                                    <a href="{{ route("profile.orderDetails",["id"=>$order["id"]]) }}"
                                                        class="btn btn-sm btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>

            </div>

        </div>
    </div>
</div>
