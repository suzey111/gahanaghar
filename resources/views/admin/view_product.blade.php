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
                <h2 class="font_size">All Products</h2>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <div class="div_center">
                    <div class="d-flex justify-content-end">
                        <a href="/add_product" class="btn btn-outline-primary text-white">Add Product</a>
                    </div>
                </div>
                <div class="mt-3">
                    <table class="table">
                        <tr class="text_color">
                            <th>Product Id</th>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete this?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                        </tr>
                        @endforeach
                        <tbody></tbody>
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