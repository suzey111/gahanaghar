<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->


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
                <h2 class="font_size">Orders</h2>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
              
                <div class="mt-3">
                    <table class="table">
                        <tr class="text_color">
                            <th>Order date</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Shipping Address</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                       
@forelse($orders as $order)
                        <tr class="text_color">
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->person_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <div>
                                    
                                <a href="{{ route('order.details',$order->id)}}" class="btn  btn-sm" style="background-color: blue;">View Items</a>
@if ($order->status == 'Pending')
                                <a href="{{route('order.status',[$order->id,'Processing'])}}" class="btn btn-secondary btn-sm" >Processing</a>

                                <a href="{{route('order.status',[$order->id,'Reject'])}}" class="btn btn-danger btn-sm">Reject</a>
@endif

@if ($order->status == 'Processing')
                                <a href="{{route('order.status',[$order->id,'Completed'])}}" class="btn btn-success btn-sm">Completed</a>
  @endif                             
                            </div>
                            </td>
                        </tr>

                        @empty

<tr>
    <td colspan="9">No Orders</td>
    </tr>
</tr>

                        @endforelse
                       
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>