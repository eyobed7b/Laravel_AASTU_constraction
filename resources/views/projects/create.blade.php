@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

       
                
                <div class = "row col-md-12 col-lg-12 col-sm-12" style="background:white; mergin:10px;">
                  <h1>Create new project</h1>
                  <form method="post" action="{{route('projects.store')}}">
                             {{csrf_field()}}
                             
                       <div class="form_group">
                           <label for="company_name">Name<span class="required"></span></label>
                         <input placeholder="Enter your Name"
                         type="text"
                         id="company_name"
                         required
                         name="name"
                         spellcheck="false"
                         class="form-control"
                        
                         >
                         <input placeholder="Enter your Name"
                         type="hidden"
                        
                         name="company_id"
                         value="{{$company_id}}"
                        
                         >

                       </div>

                       <div class="form_group">
                            <label for="company_content">Description</label>
                          <textarea  placeholder = "Enter Description"
                          style="resize:vertical;"
                          id="company_content"
                          required
                          name="description"
                          spellcheck="false"
                          
                          class="form-control autosize-target text-left">
                          </textarea>
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
            <li><a href="/projects">My projects</a></li>
        
            
            </ol>
            
            
                </div>



</div>

@endsection