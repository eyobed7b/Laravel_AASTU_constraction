<div class="row">
        <div class="col-md-12  col-sm-12  col-xs-2">

         <div class = "panel panel-primary">

           <div class="panel-heading">
             <h3 class="panel-title">
               <span class="glyphicon glyphicon-comment"></span>
               Reccent commet

             </h3>

           </div>
           <div class="panel-body">
             <ul class="media-list">

                 @foreach($comments as $comment)

               <li class="media">
                 <div class="media-left">
                 

                   <img src="../img/person.png" class="img-circle">


                 </div>
                 <div class="media-body">
                   <h4 class="media-headinng">
                   <a href="/users/{{$comment->user->id }}">
                      {{$comment->user->first_name}}  {{$comment->user->last_name}}
                    {{$comment->user->email}}  </a>
                     <br>
                     <small>
                       commented on {{$comment->created_at}}
                     </small>

                   </h4>
                   <p>
                       {{$comment->body}}
                   </p>

                   <p>
                       {{$comment->url}}
                   </p>

                 </div>

               </li>
                
               @endforeach

             </ul>

           </div>


         </div>

        </div>


      </div>