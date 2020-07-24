@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

       
                
                <div class = "row col-md-12 col-lg-12 col-sm-12" style="background:white; mergin:10px;">
                  <h1>Create new Letter</h1>
                  <form method="post" action="{{route('IDVP.store')}}">
                             {{csrf_field()}}
                            
                      <input type="hidden"  name="lette_position" value= {{Auth::user()->role_id}}>
                             
                             <div class="form_group">
                                <label for="project_content">To </label>
                                <select name="company_id" class="form-control">
                                        @foreach($companies as $company)
                                  <option value="{{$company->id}}">
      
                                    {{$company->name}}
      
                                  </option>
      
                                  @endforeach
      
                                </select>
      
                             </div>
      
                           

                       <div class="form_group">
                           <label for="project_name">Name<span class="required"></span></label>
                         <input placeholder="Enter the project name Name"
                         type="text"
                         id="project_name"
                         required
                         name="name"
                         spellcheck="false"
                         class="form-control"
                        
                         >
                        

                       </div>
                      
                       <div class="form_group">
                            <label for="project_content">Description</label>
                          <textarea  placeholder = "Enter Description"
                          style="resize:vertical;"
                          id="project_content"
                          required
                          name="description"
                          spellcheck="false"
                          
                          class="form-control autosize-target text-left">
                          </textarea>
                          <div class="form-group">
                            <input type="integer" placeholder = "days" name = "days">
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
            <li><a href="/IDVP">My IDVP</a></li>
        
            
            </ol>
            
            
                </div>



</div>

@endsection