@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "jumbotron">
                <h1> {{$company->name}}</h1>
                <p class = "lead">{{$company->description}}</p>
                
                
                
                </div>
                
                <div class = "row" style="background:white;">
                        
                        @foreach($company->projects as $project)
                    <div class = "col-lg-4">
                <h3>{{$project->name}}</h3>
                <p class="text-danger">{{$project->description}} </p>
                
                <p><a class="btn btn-primary" href="/Projects/{{$project->id}}" role="button">view project</a></p>
                
                    </div>
                    
                    @endforeach
                
                
                
                </div>

</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
            <li><a href="#">Delete</a></li>
            <li><a href="#">Add new User</a></li>
            
            </ol>
            
            
                </div>



</div>

@endsection