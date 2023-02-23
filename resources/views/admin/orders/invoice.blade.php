<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Pincode
                            <th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Payment Mode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address1 }},{{ $order->address2 }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->pincode }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->country }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
