<nav class="navbar navbar-default nav-static-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
              AASTU project managment
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav navbar-right">
    
                @guest
                
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>

             @else
            
             <li><a href="{{route('companies.index')}}" ><img src="builnging.png"> companies</a></li>
             <li><a href="{{route('projects.index')}}"><img src="case .png">Projects</a></li>
             <li><a href="{{route('tasks.index')}}">Tasks</a></li>

             @if(Auth::user()->roles == 1)

             <li class="dropdown">
                <a  class="dropdown-toggle" href="#" role="button" 
                    data-toggle="dropdown"  aria-expanded="false" >
                    Admin <span class="caret"></span>
                </a>

                <ul class="dropdown-menu"  role="menu">
                    <li><a href="{{route('tasks.index')}}">All Userd</a></li>
                    <li><a href="{{route('companies.index')}}" ><img src="builnging.png">All companies</a></li>
                    <li><a href="{{route('projects.index')}}"><img src="case .png">All Projects</a></li>
                  <li><a href="{{route('tasks.index')}}">All Tasks</a></li>
                
                </ul>
            </li>

             @endif
                
            @endguest

           
             
            </ul>
         
        
        </div>
    </div>
</nav>