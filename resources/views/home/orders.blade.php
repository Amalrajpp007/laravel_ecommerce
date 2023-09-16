<!DOCTYPE html>
<html>
   <head>
      @include('home.css')
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
              <!-- end slider section -->
              <br>
              <div class="container">
              <table class="table table-bordered">
  <thead>
    <tr class='bg-dark text-white'>
      <th scope="col">Product Title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Delivery Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <th scope="row">{{$order->product_title}}</th>
      <td>{{$order->quantity}}</td>
      <td><img src='products/{{$order->image}}' style="heght:200px;width:200px;" class="pl-5"></td>
      <td>{{$order->price}}</td>
      <td>{{$order->payment_status}}</td>
      <td>{{$order->delivery_status}}</td>
      <td>
        @if($order->delivery_status =='Processing')
        <a href="{{url('cancel',$order->id)}}" class="btn btn-danger">Cancel</a></td>
        @else
        <p class="text-center text-danger"> No orders !!!!</p>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
      </div>
      <!-- why section -->
     
      <!-- end why section -->
      
      <!-- arrival section -->
     
      <!-- end arrival section -->
      
      <!-- product section -->
   
      <!-- end product section -->

      <!-- subscribe section -->
      
      <!-- end subscribe section -->
      <!-- client section -->
   
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      @include('home.copy_right')
      <!-- jQery -->
      @include('home.js')
   </body>
</html>