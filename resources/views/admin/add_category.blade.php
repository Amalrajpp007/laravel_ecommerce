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
            <div align="center" >
                <h2 class="text-center" style="font-size:40px;">Add Category</h2>
                <form action="{{url('store_category')}}" class="mt-5" method="POST">
                    @csrf
                    
                    <input type="text" name="name" placeholder="Enter Category Here" class="text-dark" required="">
                   
                    <input type="submit" class="btn btn-success">
                </form><br>
                <br>
                <table class="table table-dark">
  <thead>

    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $cat)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
     
      <td>{{$cat->name}}</td>
      <td><a href="{{url('delete_category',$cat->id)}}" class="btn btn-danger" onclick="return confirm('are you sure')">Delete</a></td>
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