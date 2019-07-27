<nav class="navbar navbar-defualt nav-static-top navbar-inverse">
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
              LARAVEL
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
            
             <li><a href="{{route('companies.index')}}">My companies</a></li>
             <li><a href="{{route('projects.index')}}">Projects</a></li>
             <li><a href="{{route('tasks.index')}}">Tasks</a></li>
                <li class=" dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu"   role="menu">
                        <li>
                     
                                <a href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                Logout
                             </a>
     
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>

                        </li>
                    
                    </ul>
                </li>
            @endguest

           
             
            </ul>
         <!--   <ul class = "nav navbar-nav navbar-right">
      <li><a href = "/posts/create">Create post</a></li>

            </ul> -->
        <!--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    --
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                        <!-- Left Side Of Navbar -->
              <!--          <ul class="navbar-nav mr-auto">
    
                        </ul>  -->
    
                        <!-- Right Side Of Navbar -->
                <!--        <ul class="navbar-nav ml-auto"> -->
                            <!-- Authentication Links -->
                        
                  <!--      </ul>
                    </div>
                </div>
            </nav> -->
            <!-- Rig-ht Side Of Navbar -->
        
        </div>
    </div>
</nav>