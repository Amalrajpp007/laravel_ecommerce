<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href='/public'>
<meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script>
        function closeMessage(){
            var x=document.getElementById('message')
            x.style.display="none";
        }
        </script>
      
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
       <br>
       <br>
       
       @if(session()->has('message'))
       <div class="alert alert-success text-center" id="message">
       {{session()->get('message')}}
                <button type="button" class="close text-danger" onclick="closeMessage()" style="margin-left:40%">X</button>
                </div>
            @endif
           
       <div class="container" align="center">
        <div class="row">
            <div class="col col-md-11 ml-5">
            <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $totalprice=0; ?>
  
    @foreach($products as $product)
   
    <tr>
     
      <td>{{$product->product_title}}</td>
      <td><img src="products/{{$product->image}}" style="height:70px;width:80px;"></td>
      <td>{{$product->category}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->quantity*$product->price}}</td>
      <td><a href="{{url('remove_cart_item',$product->id)}}" class="btn btn-danger">Remove</td>
    </tr>
    <?php $totalprice=$totalprice+($product->quantity*$product->price);
    ?>
    @endforeach
    
    
    
</table>
<h3>Total Price: ${{$totalprice}}</h3>
<br>
<br>
<br>
@if($totalprice !=0)
<h3 class="text-danger" style="font-size:20px;">Proceed To Order</h3>
<br>
<div><a href="{{url('order_cash')}}" class="btn btn-success mr-2">Cash on delivery</a><a href="{{url('stripe',$totalprice)}}" class="btn btn-primary">Pay Using Card</a></div>
@else
<div>
<h3 class="text-danger">Your cart is empty !!!</h3>
<br> 
<a href="{{url('/')}}" class="btn btn-primary mr-2">Shop Now</a>
</div>
@endif
            </div>
        </div></div>
 
      <!-- why section -->
     <br><br>
      @include('home.footer')
      <!-- footer end -->
      @include('home.copy_right')
      <!-- jQery -->
      @include('home.js')
   </body>
</html>