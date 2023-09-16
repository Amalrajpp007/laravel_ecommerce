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
                <div class="card" style="width: 30rem;height:30erm">
  <img class="card-img-top" src="products/{{$product->image}}" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title" style="font-size:35px;">{{$product->title}}</h2>
    <h2 class="card-title" style="font-size:20px;">Category: {{$product->category}}</h2>
    <p class="card-text">{{$product->description}}</p>
    <h3 class="card-title" style="font-size:20px;"><del class="text-danger">Price: ${{$product->price}}</del></h3>
    <h2 class="card-title" style="font-size:24px;">Discount Price: ${{$product->d_price}}</h2>
    <a href="{{url('add_to_cart',$product->id)}}" class="btn btn-primary">Add To Cart</a>
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