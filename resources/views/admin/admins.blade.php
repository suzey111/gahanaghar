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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <h1 class="m-2">Create a new Admin here</h1>
                <div class="bg-slate-900/50 px-6 py-4 max-w-lg">
                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control bg-white" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control bg-white" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control bg-white" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control bg-white" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control bg-white" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Admin</button>
                    </form>
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