@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

       
                
                <div class = "row col-md-12 col-lg-12 col-sm-12" style="background:white; mergin:10px;">
                         <form method="post" action="{{route('coordinator.update',[$users->id])}}">
                             {{csrf_field()}}
                             <input type="hidden" name="_method" value="put">
                       <div class="form_group">
                           <label for="f_name">First Name<span class="required"></span></label>
                         <input placeholder="Enter your Name"
                         id="f_name"
                         required
                         name="first_name"
                         spellcheck="false"
                         class="form-control"
                         value="{{$users->first_name}}"
                         >

                       </div>
                       <div class="form_group">
                            <label for="l_name">Last Name<span class="required"></span></label>
                          <input placeholder="Enter your Name"
                          id="l_name"
                          required
                          name="last_name"
                          spellcheck="false"
                          class="form-control"
                          value="{{$Users->last_name}}"
                          >
 
                        </div>

                    
                           
                            <div class="form_group">
                                    <label for="l_name">email<span class="required"></span></label>
                                  <input placeholder="Enter your Name"
                                  id="email"
                                  required
                                  name="email"
                                  spellcheck="false"
                                  class="form-control"
                                  value="{{$Users->email}}"
                                  >
         
                                </div>
                   
        
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
           
            
            
                </div>



</div>

@endsection