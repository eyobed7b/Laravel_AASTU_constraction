@extends('layout.app')
@section('content')
<div class = "col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">

<div class = "panel panel-primary ">
<div class = "panel-heading" > {{$title}} <a class=" pull-right btn btn-primary btn--sm"  href="/companies/create">Create new company </a> </div>
<div class = "panel-body">
    <ul class = "list-group">
 

 @foreach( $compaines as $company)
      <li class = "list-group-item"><a href ="/companies/{{$company->id}}">{{$company->name}}</a></li>   
  @endforeach


@if(Auth::user()->role_id <=3)
@foreach( $compaines as $company)
  
      <li class = "list-group-item"><a href ="/companies/{{$company->id}}">{{$company->name}}</a></li>
    
  @endforeach
@endif

@if(Auth::user()->role_id == 6)
@foreach( $compaines as $company)
  
      <li class = "list-group-item"><a href ="/companies/{{$company->id}}">{{$company->name}}</a></li>
    
  @endforeach
@endif
    </ul>

</div>


</div>

</div>


@endsection