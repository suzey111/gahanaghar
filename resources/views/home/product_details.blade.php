<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="public/images/di.png" type="">
      <title>Gahana Ghar</title>
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
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 250%; padding: 30px">
                  
                     <div class="img-box" style="padding: 20px">
                        <img src="product/{{$product->image}}" alt="" style="width: 300px; height: 350px; object-fit: cover;" >
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->discount_price!=null)
                        <h6 style="color: red">
                           Discount price
                           <br>
                           Rs.{{$product->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: blue">
                           Price
                           <br>
                           Rs.{{$product->price}}
                        </h6>
                        @else
                        <h6 style="color: blue">
                            Price
                            <br>
                           Rs.{{$product->price}}
                        </h6>

                        @endif
                        <h6>Product Category : {{$product->category}}</h6>
                        <h6>Product Details : {{$product->description}}</h6>
                        <h6>Available Quantity : {{$product->quantity}}</h6>
                        <form action="{{url('add_cart',$product->id)}}" method="Post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1"  max="{{$product->quantity}}" style="width: 100px" >
                                 </div>

                                 <div class="col-md-4">
                                 <input type="submit" value="Add to cart">
                                 </div>
                     
                              </div>
                              
                           </form>
                        
                     </div>
                  </div>
               </div>
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      
        
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>