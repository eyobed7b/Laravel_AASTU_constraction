@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

       
                
                <div class = "row col-md-12 col-lg-12 col-sm-12" style="background:white; mergin:10px;">
                         <form method="post" action="{{route('office.store')}}">
                             {{csrf_field()}}
                         <title>{{$title}}</title>
                             
                             <label for="user">Select office organizer</label>
                             <select name="userOrg_id" class="form-control">
                                     @foreach($users as $user)
                               <option value="{{$user->id}}">
   
                                <pre>{{$user->first_name}}  {{$user->last_name}}</pre> 
   
                               </option>
   
                               @endforeach
   
                             </select>

                     
                          
                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="submit">

                          </div>
                        </form>
                        </div>
                
                
                
                </div>

</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/companies">My companies</a></li>
        
            
            </ol>
            
            
                </div>



</div>

@endsection