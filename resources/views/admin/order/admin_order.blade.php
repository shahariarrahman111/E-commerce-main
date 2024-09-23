@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.order') }}">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Order Number</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center">Payment Method</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Order Status</th>
                                    <th class="text-center">Payment Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user->firstname }} {{ $order->user->lastname }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td> <!-- Display the order status here -->
                                        <td>{{ ucfirst($order->payment_status) }}</td>
                                        <!-- Display the payment status here -->
                                        <td>
                                            <a href="{{ route('admin.order.view', $order->id) }}"
                                                class="btn btn-primary">View Order</a>
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
@endsection