<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
    <script>
        function closeMessage(){
            var x=document.getElementById('message')
            x.style.display="none";
        }
        </script>
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
          @if(session()->has('message'))
              <div class="alert alert-success text-center" id="message">
               
                  
                {{session()->get('message')}}
                <button type="button" class="close text-danger" onclick="closeMessage()" style="margin-left:40%">X</button>
              </div>
            @endif
          <div class="container">
            <div class="row">
            <h2 class="text-center" style="font-size:40px;">Add Product</h2>
            <form action="{{url('store_product')}}" method="POST" enctype="multipart/form-data">
              @csrf
              
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Title</label>
    <input type="text" class="form-control text-white bg-dark" id="title" placeholder="Product Title" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Description</label>
    <textarea class="form-control  text-white" id="description" rows="3" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">product Image</label>
    <input type="file" class="form-control text-white" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Product price</label>
    <input type="number" class="form-control text-white bg-dark" id="exampleFormControlInput1" placeholder="Product price" name="price">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Quantity</label>
    <input type="number" class="form-control text-white bg-dark" id="quantity" placeholder="Product Quantity" name="quantity">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category</label>
    <select class="form-control text-white" id="exampleFormControlSelect1" name="category">
      @foreach($categories as $cat)
      <option value="{{$cat->name}}">{{$cat->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Discount  price</label>
    <input type="number" class="form-control text-white bg-dark" id="exampleFormControlInput1" placeholder="Discount  price" name="d_price">
  </div>
 
  <input type="submit" class="btn btn-success" style="margin-left:40%;">
</form>
            </div>
          </div>
</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>