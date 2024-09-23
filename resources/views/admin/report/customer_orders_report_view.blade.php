@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('customer.report') }}">Report</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer Orders</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders for {{ $customer->firstname }} {{ $customer->lastname }}</h4>
                    <form method="GET" action="{{ route('customer.report.all.orders', $customer->id) }}">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <input type="text" name="order_number" class="form-control" placeholder="Order Number"
                                    value="{{ request('order_number') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                            </div>
                            <div class="col-md-3">
                                <select name="month" class="form-control">
                                    <option value="">Select Month</option>
                                    @foreach(range(1, 12) as $month)
                                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-2 mt-md-0">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('customer.report.all.orders', $customer->id) }}"
                                    class="btn btn-secondary">Reset</a>
                                <a href="{{ route('customer.report.pdf', $customer->id) }}"
                                    class="btn btn-danger">Download Report</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Order Number</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center">Payment Method</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders->isEmpty())
                                    <tr>
                                        <td colspan="6">No orders found for this search criteria.</td>
                                    </tr>
                                @else
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('customer.report.order.view', $order->id) }}"
                                                    class="btn btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <a href="{{ route('customer.report') }}" class="btn btn-secondary mt-3">Back to Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection