<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div align='center'>
               <form action="{{ url('search_products') }}"  style='width:30%'>
               @csrf
               <input type="text" name='search' id='search' placeholder='Search Products here'>
               <input type='submit' class='btn btn-large-dark'>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('view_product',$product->id)}}" class="option1">
                          {{$product->title}}
                           </a>
                       
                           <a href="{{url('add_to_cart',$product->id)}}" class="option2">
                           Add to cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="products/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                          {{$product->title}}
                        </h5>
                        <h6 class="text-danger">
                          <del> ${{$product->price}}</del>
                        </h6>
                        <h5>${{$product->d_price}}</h5>
                     </div>
                  </div>
               </div>
               @endforeach
               
           
         </div>
         <br>
         <br>
         {{$products->links()}}
      </section>