@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "jumbotron">
                <h1> {{$company->name}}</h1>
                <p class = "lead">{{$company->description}}</p>
                
                
                
                </div>
                
                <div class = "row col-lg-12 col-sm-12 col-md-12"  style="background:white; marging:10px">
                        <a href="/projects/create" class="pull-right btn btn-default btn-sm"> Add Project</a>       
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
            <li><a href="/Projects/create"> Add project </a></li>
            <li><a href="/companies/create"> create new company </a></li>
            <li><a href="/companies/"> My  company </a></li>
            
            <br>
             
            <li><a href = "#"
                      onclick = "var result = confirm('Are you sure you wish to delete this project');
                         if( result )
                         {
                           //  alert('hello');
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                            // document.write('deleteing');'
                            alert('hello');
                         }

                      ">
                      Delete
                
                </a>
            <label id = "lb"></label>
            <form id ="delete-form" action = "{{route('companies.destroy',[$company->id])}}" method="POST" style="display:none">
                  <input type="hidden" name="_method" value="delete">
                  {{csrf_field()}}
                </form>

            </li>

            
            
            </ol>
            
            
                </div>



</div>

@endsection