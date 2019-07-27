<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','lara')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <!-- Styles -->
      
    </head>
    @include('inc.navbar')
   
    <div  class = "container">
        @include('partials.errors')
        @include('partials.success')
    <div class ="row">
 @yield('content') 
    </div>
     </div>
  
        
    <body>
        
</html>
