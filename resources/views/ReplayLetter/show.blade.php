@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "well well-lg">
                <h1> {{$ReplayLetter->name}}</h1>
                <p class = "lead">{{$ReplayLetter->description}}</p>

@if(Auth::user()->role_id == $ReplayLetter->letter_position ) 
       
         @include('ReplayLetters.accept-reject-btn')
         @elseif(Auth::user()->role_id < $ReplayLetter->letter_position ) 
        <label>Accepted </label>
         @endif


   








                
          
        

             
                
               
                </div>
                
                <div class = "row col-lg-12 col-sm-12 col-md-12"  style="background:white; marging:10px">
                        <a href="/ReplayLetters/create/{{$ReplayLetter->id}}" class="pull-right btn btn-info btn-sm"> Add ReplayLetter</a>       
              
              
              
                        <br/>   <h2>Comments</h2> 
                     
                      @include('partials.comment')
                
                
            

               <div class="row container-fluid">

                 

                <form method="post" action="{{route('comments.store')}}">
                    {{csrf_field()}}
               
                    
                <input type="hidden" name="commentable_type" value ="App\ReplayLetter">
                <input type="hidden" name="commentable_id" value = "{{$ReplayLetter->id}}" >
              

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
          

                 </div>

                 <div class="form_group">
                    <label for="company_content">proof of work done (URL/Photo)</label>
                  <textarea  placeholder = "Enter URL"
                  style="resize:vertical;"
                  id="comment_url"
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
                        
             

               
                     
                     

                  

                         
                
                
                </div>

                

</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    

    <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/ReplayLetters/{{$ReplayLetter->id}}/edit}}/edit">Edit</a></li>
            <li><a href="/ReplayLetters/"> My  ReplayLetter </a></li>
            <li><a href="/ReplayLetters/create"> create new ReplayLetter </a></li>
            
            <br>
             @if($ReplayLetter->user_id== Auth::user()->id)
            <li><a href = "#"
                      onclick = "var result = confirm('Are you sure you wish to delete this ReplayLetter');
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
            <form id ="delete-form" action = "{{route('ReplayLetters.destroy',[$ReplayLetter->id])}}" method="POST" style="display:none">
                  <input type="hidden" name="_method" value="delete">
                  {{csrf_field()}}
                </form>

            </li>
            @endif

            
            
            </ol>
            
            
                </div>



</div>

@endsection