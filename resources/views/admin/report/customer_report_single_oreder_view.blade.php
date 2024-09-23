@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('customer.report') }}">Report</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer Order Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Order Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Order Number:</th>
                                <td>{{ $order->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name:</th>
                                <td>{{ $order->user->firstname }} {{ $order->user->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>
                                    {{ $order->address->division }},
                                    {{ $order->address->city }},
                                    {{ $order->address->road_no }},
                                    {{ $order->address->house_no }}
                                </td>
                            </tr>
                            <tr>
                                <th>Total Price:</th>
                                <td>{{ $order->total_price }}</td>
                            </tr>
                            <tr>
                                <th>Payment Method:</th>
                                <td>{{ $order->payment_method }}</td>
                            </tr>
                            <tr>
                                <th>Order Date:</th>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ ucfirst($order->status) }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status:</th>
                                <td>{{ ucfirst($order->payment_status) }}</td>
                            </tr>
                        </table>
                    </div>
                    <h5 class="mt-5">Order Items</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit_price }}</td>
                                        <td>{{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('customer.report') }}" class="btn btn-secondary mt-3">Back to Report</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection