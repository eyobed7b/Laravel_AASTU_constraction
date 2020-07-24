
<table>
    <tr>
      <td>
  
          <a href = "#" class=" btn btn-success btn-md"
          onclick = "var result = confirm('Are you sure you wish to Accept this letter');
             if( result )
             {
               //  alert('hello');  
                 event.preventDefault();
                 document.getElementById('accept-form').submit();
                // document.write('deleteing');'
               
             }
  
          ">
         Accept
    
    </a>
  <label id = "lb"></label>
  
    <form id ="accept-form" method="post" style="display:none" action="{{route('projects.update',[$project->id])}}">
       
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="letter_position" value={{$project->letter_position }}>>
       
  
   
    
       
         
         {{csrf_field()}}
   
   </form>
  
  
      </td>
  
      <td>
  
          <a href = "#" class=" btn btn-danger btn-md"
          onclick = "var result = confirm('Are you sure you wish to reject this letter');
             if( result )
             {
               //  alert('hello');  
                 event.preventDefault();
                 document.getElementById('reject-form').submit();
                // document.write('deleteing');'
               
             }
  
          ">
         Reject
    
    </a>
  <label id = "lb"></label>
  
    <form id ="reject-form" method="post" style="display:none" action="{{route('projects.update',[$project->id])}}">
       
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="PM_confirm" value=2>
        <input type="hidden" name="VPM_confirm" value=2>
        <input type="hidden" name="user" value= {{Auth::user()->id}}>
  
   
    
       
         
         {{csrf_field()}}
   
   </form>
   
      </td>
  
    </tr>
  </table>