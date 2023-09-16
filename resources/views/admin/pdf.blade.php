<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pdf</title>
</head>
<body>
    <h1 align="center">Order Details</h1>
    <br>
    <div  align="center" >
      <img src="products/{{$order->image}}" style="height:200px;width:200px;">
    </div>
    <br>
    <h2 align="center" style='color:blue;'>Product Name: {{$order->product_title}}</h2>
    <h2 align="center">Quantity: {{$order->quantity}}</h2>
    <h2 align="center">Price: {{$order->price}}</h2>
    <h2 align="center">Total price: {{$order->quantity* $order->price}}</h2>
    <h2 align="center">Customer Name: {{$order->name}}</h2>
    <h2 align="center">Address: {{$order->address}}</h2>
    <h2 align="center" style='color:green'>Payment Status: {{$order->payment_status}}</h2>
    

</body>
</html>