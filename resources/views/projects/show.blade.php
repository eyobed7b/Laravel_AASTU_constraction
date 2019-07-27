@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "well well-lg">
                <h1> {{$project->name}}</h1>
                <p class = "lead">{{$project->description}}</p>
                
                
                
                </div>
                
                <div class = "row col-lg-12 col-sm-12 col-md-12"  style="background:white; marging:10px">
                        <a href="/projects/create/{{$project->id}}" class="pull-right btn btn-default btn-sm"> Add project</a>       
               <br>
               <div class="row container-fluid">
                <form method="post" action="{{route('comments.store')}}">
                    {{csrf_field()}}
               
                    <input type="hidden" name="commentable_id" value=" {{$project->id}}">
                <input type="hidden" name="commentable_id" value="project">
              

              <div class="form_group">
                   <label for="company_content">Comment</label>
                 <textarea  placeholder = "Enter comment"
                 style="resize:vertical;"
                 id="comment-contetn"
                 required
                 name="body"
                 spellcheck="false"
                 
                 class="form-control autosize-target text-left">
                 </textarea>
                </div>

                 <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="submit">

                 </div>

                 <div class="form_group">
                    <label for="company_content">proof of work done (URL/Photo)</label>
                  <textarea  placeholder = "Enter URL"
                  style="resize:vertical;"
                  id="C=comment_url"
                  required
                  name="url"
                  spellcheck="false"
                  
                  class="form-control autosize-target text-left">
                  </textarea>
                </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="submit">

                  </div>
                </form>

               </div>
                        
               
               
                        {{--
                    
                       @foreach($project as $projects)
                    <div class = "col-lg-4">
                <h3>{{$projects->name}}</h3>
                <p class="text-danger">{{$projects->description}} </p>
                
                <p><a class="btn btn-primary" href="/projects/{{$projects->id}}" role="button">view project</a></p>
                
                    </div>
                    
                    @endforeach
                

                    --}}     
                
                
                </div>

                

</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/companies/{{$project->id}}/edit">Edit</a></li>
            <li><a href="/projects/create/{{$project->id}}"> create new project </a></li>
            <li><a href="/companies/"> My  project </a></li>
            
            <br>
             @if($project->user_id== Auth::user()->id)
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
            <form id ="delete-form" action = "{{route('companies.destroy',[$project->id])}}" method="POST" style="display:none">
                  <input type="hidden" name="_method" value="delete">
                  {{csrf_field()}}
                </form>

            </li>
            @endif

            
            
            </ol>
            
            
                </div>



</div>

@endsection