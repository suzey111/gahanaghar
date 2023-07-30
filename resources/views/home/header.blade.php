<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logs.jpg" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#product">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#footer">Contact</a>
                        </li>

                        @auth
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('myorders')}}">Orders</a>
                        </li>
                        
                        @endauth
                        
                       
                        @guest
                        
                       
                        <li class="nav-item">
                           <a class="btn btn-outline-primary" id="logincss"  href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-outline-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                           <form action="{{ route('logout') }}" method="post">
                              @csrf
                           <button class="btn btn-outline-primary" id="logincss">Logout</button>
                           </form>
                        </li>
                        @endauth


                     </ul>
                  </div>
               </nav>
            </div>
         </header>