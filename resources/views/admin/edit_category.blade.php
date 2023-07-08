<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
     <base href="/public">
      @include('admin.css')
      <style type="text/css">

         .div_center
            {
                text-align:center;
                padding-top:40px;
            }
            .h2_font
            {
                font-size:40px;
                padding-bottom:40px;
            }
            .input_color
            {
                color:black;
            }
            .center
            {
              margin: auto;
              width:50%;
              text-align: center;
              margin-top:30px;
              border: 3px solid gray;
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
          <a class="btn btn-outline-primary text-white" height="5px" href="{{route('back')}}">Back</a>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Edit Category</h2>
                <form action="{{url('/update_category')}}" method="POST">
                    @csrf
                    <input class="input_color" type="hidden" name="id" placeholder=" Write category name" value="{{$data->id}}">
                    <input class="input_color" type="text" name="category_name" placeholder=" Write category name" value="{{$data->category_name}}">
                    <input type="submit" class="btn btn-primary"  value="Update">
                </form>
            </div>
            

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>