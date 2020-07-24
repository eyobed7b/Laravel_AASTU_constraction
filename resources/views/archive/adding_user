@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "jumbotron">
                <h1> {{$Users}}</h1>
                <table>
                
                    <tr>
                        <td> Name </td>
                        <td>Email</td>
                    </tr>
                    @foreach($users as $user)
                    <ol class="list-unstyled">
                    <tr>
                        <td><li class="list-unstyled"><a href="/PM/{{$user->id}}"><pre>{{$user->first_name}} {{$user->last_name}}</pre></a> </li></td>
                        <td><li class="list-unstyled"><a href="#">{{$user->email}}</a></li></td>
                        <td> <form id ="add_user" action = "{{route('pm.adduser')}}" method="POST" >
                                
                           
                         
                <div class="input-group">
                <input  type="hidden" name="email" value="{{$user->email}}" >
                   
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Add</button>

                    </span>
               
                </div>
                {{csrf_field()}}
            </form>
        </td>
                    </tr>
                </ol>
                    @endforeach
               
            </table>
                
                
                </div>
              

</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">

            <h4>Actions</h4>
            <ol class="list-unstyled">
            
           


            
            
            </ol>
            <hr/>
            <h4>Add Project Manager</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <form id ="add_user" action = "" method="POST" >
                                
                                {{csrf_field()}}
                             
                    <div class="input-group">
                  <input type="hidden" name="role_id" value="2">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Add</button>

                        </span>
                   
                    </div>
                </form>
                </div>
            
            </div>

            <h4>Project Manager</h4>
            <ol class="list-unstyled">
                @foreach($users as $user)
                @if($user->role_id==4)
                <table>
                    <tr>
                        <td>
                               <li><a><pre>{{$user->first_name}}  {{$user->last_name}}           </pre> </a></li> 
                        </td>

                        <td> <form id ="add_user" action = "{{route('pm.adduser')}}" method="POST" >
                                
                           
                         
                                <div class="input-group">
                                <input  type="hidden" name="email" value="{{$user->email}}" >
                                   <input type="hidden" name="type" value="removing">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Remove</button>
                
                                    </span>
                               
                                </div>
                                {{csrf_field()}}
                            </form>
                        </td>
                    </tr>
                </table>
               
            <li> </li>
                @endif
                @endforeach
            </ol>
        
          
            
                </div>


</div>
</div>


@endsection