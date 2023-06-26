<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->


    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td></td>
                            </tr>
                        </thead>
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