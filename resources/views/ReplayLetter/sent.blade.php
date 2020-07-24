
    
<a href = "#" class="pull-right btn btn-success"
onclick = "var result = confirm('Are you sure you went to send');
   if( result )
   {
     //  alert('hello');  
       event.preventDefault();
       document.getElementById('send-form').submit();
      // document.write('deleteing');'
     
   }

">
Send 

</a>
<form id ="send-form" method="post" style="display:none" action="{{route('projects.update',[$project->id])}}">
     
  <input type="hidden" name="_method" value="put">
  @if(Auth::user()->role_id == 5)
 
  <input type="hidden" name="coordinator" value=1>
  @elseif(Auth::user()->role_id == 6)
  <input type="hidden" name="office" value=1>
  @endif
  <input type="hidden" name="user" value= {{Auth::user()->id}}>
  



 
   
   {{csrf_field()}}

</form>
  