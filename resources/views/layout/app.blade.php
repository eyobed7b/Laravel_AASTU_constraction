<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
    <meta name="csrf-token" content="{{csrf_token()}}">
        
        <title>{{config('app.name','lara')}}</title>





        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <!-- Styles str_replace('_', '-',  -->
      
    </head>
<body>
    <div class="app">
  
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
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
                      {{config('app.name','Laravel')}}
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
                  
                     @if(Auth::user()->role_id  == 1)
                     <li><a href="{{route('archive.index')}}" > Archive</a></li>
                     <li><a href="{{route('IDVP.index')}}" > IDVP</a></li>
    
                     <li><a href="{{route('PM.index')}}">Project Manager</a></li>
                     <li><a  href="{{route('VPM.index')}}">Vise Project Manager</a></li>
                     <li><a  href="{{route('coordinator.index')}}">Coordinator</a></li>
                     <li><a  href="{{route('office.index')}}">Offices</a></li>
                     <li><a href="{{route('companies.index')}}" > companies</a></li>
                     @endif
                    
                     @if(Auth::user()->role_id  == 2)
                     <li><a href= "{{route('projects.create')}}">Create new project </a> </li>
                                  @endif
                          
                            @if(Auth::user()->role_id == 4)
                       <li><a href="{{route('companies.index')}}" > companies</a></li>
                     <li><a href="{{route('projects.index')}}">Projects</a></li>
                    
                     
                     @endif
                     @if(Auth::user()->role_id == 5  || Auth::user()->role_id == 6 ||
                      Auth::user()->role_id == 2 || Auth::user()->role_id == 3 || Auth::user()->role_id == 9 )
                     <li><a href="{{route('projects.index')}}">Projects</a></li>
                     @endif
                   
                  

                     @if(Auth::user()->role_id == 7)
                     <li><a href="{{route('companies.index')}}" > companies</a></li>
                     <li><a href="{{route('projects.index')}}">Projects</a></li>
                     @endif

                     @if(Auth::user()->role_id == 6)
                     <li><a href="{{route('companies.index')}}" > companies</a></li>
                     @endif

                     @if(Auth::user()->role_id == 8 )
                     <li><a href="{{route('companies.index')}}" > companies</a></li>
                     <li><a href="{{route('projects.index')}}">Projects</a></li>
                     <li><a href="{{route('ReplayLetter.index')}}">Replayed Letter</a></li>
                     @endif
                    
                 
                     <li>
                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                 
        
                     @endguest
                     
                    </ul>
                 
                    
                </div>
            </div>
        </nav>
    </div>
   
   
    <div  class = "container">
        @include('partials.errors')
        @include('partials.success')
    <div class ="row">
 @yield('content') 
    </div>
     </div>
  
        
    </body>
        
</html>
