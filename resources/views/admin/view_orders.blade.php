<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
  </head>
  <body style="margin:0;">
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h2 class="text-center" style="font-size:30px;">All Orders</h2>
            <br>
           <div>
            <div align="center" class='text-dark'>
              <form action="{{url('search_order')}}">
              <input type="text" placeholder="search" name="search">
              <input type='submit' value='search' class='btn btn-outline-primary'>
</form>
            </div>
            <br>
             
                    
                    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"style="font-size:11px;">Name</th>
      <th scope="col"style="font-size:11px;;">Email</th>
   
      <th scope="col" style="font-size:11px;;">Phone</th>
      <th scope="col" style="font-size:11px;;">Product Title</th>
      <th scope="col" style="font-size:11px;;">Quantity</th>
      <th scope="col" style="font-size:11px;;">Price</th>
      <th scope="col" style="font-size:11px;;">payment Status</th>
      <th scope="col" style="font-size:11px;;">Delivery Status</th>
      <th scope="col" style="font-size:11px;;">Image</th>
      <th scope="col" style="font-size:11px;;">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <td style="font-size:10px;;">{{$order->name}}</td>
      <td style="font-size:10px;;">{{$order->email}}</td>
      
      <td style="font-size:10px;;">{{$order->phone}}</td>
      <td style="font-size:10px;;">{{$order->product_title}}</td>
      <td style="font-size:10px;;">{{$order->quantity}}</td>
      <td style="font-size:10px;;">{{$order->price}}</td>
      <td style="font-size:10px;;">{{$order->payment_status}}</td>
      <td style="font-size:10px;;">{{$order->delivery_status}}</td>
      <td><img src="products/{{$order->image}}"></td>
      <td>
      <a href="{{url('print_pdf',$order->id)}}" class="btn btn-danger mb-2"  style="font-size:11px;;">Print PDF</a>
      <br>
      <a href="{{url('send_email',$order->id)}}" class="btn btn-warning mb-2"  style="font-size:11px;;">Send Email</a>
      <br>
        @if($order->delivery_status =='Processing')
        <a href="{{url('set_as_delivered',$order->id)}}" class="btn btn-primary"  style="font-size:11px;;" onclick="return confirm('Are you sure ? ')">Delivered </a>
        @else
       
        <p class="text-center text-success"  style="font-size:11px;;">Delivered</p>
        @endif
</td>

    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
           
</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>