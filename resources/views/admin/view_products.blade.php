<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
  </head>
  <body>
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
            <h2 class="text-center" style="font-size:37px;">All Products</h2>
            <table class="table table-dark border-2">
  <thead>
    <tr>
      <th scope="col" class="text-center text-success">#</th>
      <th scope="col" class="text-center text-success">Title</th>
      <th scope="col" class="text-center text-success">Category</th>
      <th scope="col" class="text-center text-success">Image</th>
      <th scope="col" class="text-center text-success">Price</th>
      <th scope="col" class="text-center text-success">Discount Price</th>
      <th scope="col" class="text-center text-success">Quantity</th>
      <th scope="col" class="text-center text-success">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td class="text-center">{{$product->title}}</td>
      <td class="text-center">{{$product->category}}</td>
      <td class="text-center"><img src="products/{{$product->image}}"></td>
      <td class="text-center">{{$product->price}}</td>
      <td class="text-center">{{$product->d_price}}</td>
      <td class="text-center">{{$product->quantity}}</td>
      <td class="">
        <a href="{{url('edit_product',$product->id)}}" class="btn btn-primary mr-3">Update</a>
        <a href="{{url('delete_product',$product->id)}}"  class="btn btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
      
  </tbody>
</table>

</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>