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

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px; 
            
        }

        table,th,td
        {
            border: 2px solid black;
        }

        .th_deg
        {
            font-size: 23px;
            padding: 5px;
            background: gray;
        }

        .img_deg
        {
            height: 150px;
            width: 150px;
        }

        .total_deg
        {
            font-size: 30px;
            padding: 40px;
            color:red;
            text-align: center;

        }

        
      </style>



   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
      
         <h2>Ordered Items</h2>
         <hr>
         <!-- why section -->
            
             
              <x-order-items orderid="{{ $orderid }}"  />
                
                    
                    
                
                
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