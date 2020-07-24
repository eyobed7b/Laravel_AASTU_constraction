@extends('layout.app')
@section('content')
<div class = "col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">

<div class = "panel panel-primary ">
<div class = "panel-heading" > Office organizers <a class=" pull-right btn btn-primary btn--sm"  href="/office/create">Create new Office </a> </div>
<div class = "panel-body">
    <ul class = "list-group">


 @foreach( $users as $user)
    <li><a  class = "list-group-item" href="/office/{{$user->id}}">{{$user->first_name}}  {{$user->last_name}}</a></li>
  @endforeach

    </ul>

</div>


</div>

</div>


@endsection