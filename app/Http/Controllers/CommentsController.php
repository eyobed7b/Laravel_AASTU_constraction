<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class CommentsController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response


    */
         
    public function adduser(){
        
    }

     public function index()
   {
       if(Auth::check())
       {
           $compaines = Comment::where('user_id', Auth::user()->id)->get();
           $data = array('title'=>'compaines','compaines'=>$compaines);
     
     
        return view('companies/index')->with($data);
       }
return view('auth.login');
    
    // return view('companies/index', ['companies'=> $compaines] );
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('companies.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       if(Auth::check()){
           $comment = comment::create([
               'body'=>$request->input('body'),
               'url'=>$request->input('url'),
               'commentable_id'=>$request->input('commentable_id'), 
               'commentable_type'=>$request->input('commentable_type'), 
            'user_id'=>Auth::user()->id
              
           ]);

           if($comment)
           {
            return back()->with('succes','new comment is added');
           }
       }
       return back()->withinput()->with('error','can not create new comment');  
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\comment  $comment
    * @return \Illuminate\Http\Response
    */
   public function show(Comment $comment)
   {
      $comment = comment::find($comment->id);
//$projects = project::where('comment_id',$comment->id);
      //return $projects;
      //$data = array('title'=>'commenti','commenti'=>$commenti);
     
  return view('companies.show',['comment'=>$comment]);//,['projects'=>$projects]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\comment  $comment
    * @return \Illuminate\Http\Response
    */
   public function edit(Comment $comment)
   {
       $comment = comment::find($comment->id);
       return view('companies.edit',['comment'=>$comment]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\comment  $comment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Comment $comment)
   {
       $commentUpdate = comment::where('id',$comment->id)->update([
           'name'=>$request->input('name'),
           "description"=>$request->input('description')
       ]);
       if($commentUpdate){
           return redirect()->route('companies.show',['comment'=>$comment->id])->with('succes','comment updated succesfully');
       }
        return back()->withinput();
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\comment  $comment
    * @return \Illuminate\Http\Response
    */
   public function destroy(Comment $comment)
   {
       $findcomment = comment::find($comment->id);
       if($findcomment->delete()){
           return redirect()->route('companies.index')->with('success','comment deleted successfuly');
       }
       return back()->withInput()->with('error','comment could not be deleted');
   }
}
