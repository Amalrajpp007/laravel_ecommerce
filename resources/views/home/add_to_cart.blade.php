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
      
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <br>
         <br>
         <br>
        <div class="container" align="center">
            <div class="row">
                <div class="col md-10">
                <div class="card" style="width: 25rem;">
  <img class="card-img-top" src="products/{{$product->image}}" alt="Card image cap" style="height:270px;">
  <div class="card-body">
    <h2 class="card-title" style="font-size:35px;">{{$product->title}}</h2>
    <h2 class="card-title" style="font-size:20px;">Category: {{$product->category}}</h2>
    <p class="card-text">{{$product->description}}</p>
   
    <h2 class="card-title" style="font-size:24px;"> Price: ${{$product->d_price}}</h2>
    @if($product->quantity >0)
    <form action="{{url('store_cart_item',$product->id)}}" method='POST'>
        @csrf
    <input type="number" min='1' max='{{$product->quantity}}' name='quantity' required=''>
    <input type="submit" class="btn btn-primary" value="Add">
</form>
@else
<h3 class="text-danger text-center">Out of Stock  !!!</h3>
@endif
  </div>
</div>
                </div>
            </div>
        </div>
              <!-- end slider section -->
      </div>
      <br>
      <br>
      <br>
      <!-- why section -->
     
      @include('home.footer')
      <!-- footer end -->
      @include('home.copy_right')
      <!-- jQery -->
      @include('home.js')
   </body>
</html>