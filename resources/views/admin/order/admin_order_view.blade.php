@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.order') }}">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Order Details</h4>
                        <a href="{{ route('admin.order') }}" class="btn btn-secondary">Back to Orders</a>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card border-light mb-3">
                                <div class="card-header bg-primary text-white">Order Information</div>
                                <div class="card-body">
                                    <table class="table table-borderless">
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
                                            <td>
                                                <form action="{{ route('admin.order.updateStatus', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="form-select"
                                                        onchange="this.form.submit()">
                                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Returned</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status:</th>
                                            <td>
                                                <form
                                                    action="{{ route('admin.order.updatePaymentStatus', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="payment_status" class="form-select"
                                                        onchange="this.form.submit()">
                                                        <option value="pending_payment" {{ $order->payment_status == 'pending_payment' ? 'selected' : '' }}>Pending Payment</option>
                                                        <option value="payment_due" {{ $order->payment_status == 'payment_due' ? 'selected' : '' }}>
                                                            Payment Due</option>
                                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                        <option value="payment_failed" {{ $order->payment_status == 'payment_failed' ? 'selected' : '' }}>Payment Failed</option>
                                                        <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-light mb-3">
                                <div class="card-header bg-primary text-white">Order Items</div>
                                <div class="card-body">
                                    <table class="table table-bordered">
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
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('admin.order') }}" class="btn btn-secondary">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection