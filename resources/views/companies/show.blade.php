@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "jumbotron">
                <h1> {{$company->name}}</h1>
                <p class = "lead">{{$company->description}}</p>
                
                
                
                </div>
                @if(Auth::user()->id>=2)
                <div class = "row col-lg-12 col-sm-12 col-md-12"  style="background:white; marging:10px">
                <a href="/projects/create/{{$company->id}}" class="pull-right btn btn-default btn-sm"> Add Project</a>       
                        @foreach($company->projects as $project)
                        @if( $project->PM_confirm == 1 &&
                          $project->PM_confirm == 1 &&
                           $project->CO_confirm ==1)
                    <div class = "col-lg-4">
                <h3>{{$project->name}}</h3>
                <p class="text-danger">{{$project->description}} </p>
                
                <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">view project</a></p>
                
                    </div>
                    @endif
                    
                    @endforeach
                
                
                
                </div>
                @endif

              
              

</div>



<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">

            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/companies/{{$company->id}}/edit">Edit company</a></li>
                @if(Auth::user()->role_id==6)
            <li><a href="/projects/create/{{$company->id}}"> Add project </a></li> 
                 @endif
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
            <hr/>
            <h4>Add user</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <form id ="add_user" action = "{{route('companies.adduser')}}" method="POST" >
                                
                                {{csrf_field()}}
                             
                    <div class="input-group">
                    <input   type="hidden" name="company_id" value="{{$company->id}}" >
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Add</button>

                        </span>
                   
                    </div>
                </form>
                </div>
            
            </div>

            <h4>Users</h4>
            <ol class="list-unstyled">
                @foreach($company->Users as $user)
            <li><a href="#"><pre>{{$user->first_name  }} {{$user->last_name}}</pre></a> </li>
                @endforeach
            </ol>
        
          
            
                </div>


</div>
</div>


@endsection