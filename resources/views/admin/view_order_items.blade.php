<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">


    @include('admin.css')
    <style type="text/css">

    .font_size
    {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    
    }
    
    .img_size
    {
        width: 250px;
        height: 250px;
        
    }

    .text_color
    {
        color: white;
    }

    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="font_size">Order Items</h2>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div>
                    <div>
                        Customer Name: {{$order->user->name}} <br>
                        Customer Email: {{$order->user->email}}
                    </div>
                </div>
            
              <x-order-items orderid="{{$order->id}}" />
            </div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>