@extends('layout.app')
@section('content')
<div class = "col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">

<div class = "panel panel-primary ">
   
<div class = "panel-heading" > {{$title}} <a class=" pull-right btn btn-primary btn--sm"  href="/projects/create">Create new project </a> </div>
   
<div class = "panel-body">
    <ul class = "list-group">
 
 @foreach( $ReplayLetter as $ReplayLetterr)
     
        
          <li class = "list-group-item"><a href ="/ReplayLetter/{{$ReplayLetterr->id}}">{{$ReplayLetterr->description}}</a></li>
         
  @endforeach

    </ul>

</div>


</div>

</div>


@endsection