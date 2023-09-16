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
         @include('home.slider')
              <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrivals')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.products')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.testimonials')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      @include('home.copy_right')
      <!-- jQery -->
      @include('home.js')
   </body>
</html>