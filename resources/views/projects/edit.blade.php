@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

       
                
                <div class = "row col-md-12 col-lg-12 col-sm-12" style="background:white; mergin:10px;">
                         <form method="post" action="{{route('companies.update',[$company->id])}}">
                             {{csrf_field()}}
                             <input type="hidden" name="_method" value="put">
                       <div class="form_group">
                           <label for="company_name">Name<span class="required"></span></label>
                         <input placeholder="Enter your Name"
                         id="company_name"
                         required
                         name="name"
                         spellcheck="false"
                         class="form-control"
                         value="{{$company->name}}"
                         >

                       </div>

                       <div class="form_group">
                            <label for="company_content">Description</label>
                          <textarea placeholder="Enter Description"
                          style="resize:vertical;"
                          id="company_content"
                          required
                          name="description"
                          spellcheck="false"
                          class="form-control autosize-target text-left">
                          {{$company->description}}</textarea>
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
            <li><a href="/companies/{{$company->id}}">View company</a></li>
            <li><a href="/companies">All companies</a></li>
        
            
            </ol>
            
            
                </div>



</div>

@endsection