<!DOCTYPE html>
<html>

<head>
    <title>Customer Orders Report</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .customer-info,
        .order-info {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .customer-info h2,
        .order-info h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Orders Report for {{ $customer->firstname }} {{ $customer->lastname }}</h1>
        </div>
        <div class="customer-info">
            <h2>Customer Information</h2>
            <p><strong>Name:</strong> {{ $customer->firstname }} {{ $customer->lastname }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong>
                {{ $customer->address->division }}, {{ $customer->address->city }},
                {{ $customer->address->road_no }}, {{ $customer->address->house_no }}
            </p>
        </div>
        <div class="order-info">
            <h2>Order Information</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <ul>
                                    @foreach($order->items as $item)
                                        <li>{{ $item->product->name }} (Quantity: {{ $item->quantity }}, Unit Price:
                                            {{ $item->unit_price }}, Total: {{ $item->total_price }})
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Generated on {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</body>

</html>