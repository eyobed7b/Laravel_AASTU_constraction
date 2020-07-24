<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\support\Facades\Auth;


class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adduser(Request $request ){
      
        
         $user = User::where('email' ,$request->input('email') )->first();
        
         if($user)
         {
             if($request->input('type')=="removing")
             {
               $userUpdate = User::where('email',$request->input('email'))->update([
                   'role_id'=> 1,]);
                   if($userUpdate){
                    $Coordinator = User::where('email',$request->input('email'));
                    return redirect()->route('Coordinator.index')->with('succes','
                    {{$Coordinator}}Project manager is removed succesfully');
                }

             }
          $data = array('users'=>'user','user'=>$user);
             return view('Coordinator/edite' )->with($data);
         }
 
         
     
    
 
      }
 
    public function index()
    {
        $user = user::all();
        $data = array('Users'=>'users','users'=> $user);
       // $data = array('Users'=>'user','user'=>$user);
        return view('Coordinator/index')->With($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show( User $user)
    {
        
       
       $users = user::find($user->id);
       $data = array('title'=>'users','users'=>$users);
 
      if($users!= null)
      {
        return view ('Coordinator.show',['users'=>$users]);
      }
      else
      return "null";
       
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::find($user->id);
      
        return view('Coordinator.edite',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
        $userUpdate = User::where('email',$request->input('email'))->update([
            'role_id'=> 6,
           
        ]);
        if($userUpdate){
            $Coordinator = User::where('email',$request->input('email'));
            return redirect()->route('coordinator.index')->with('succes','
            Project manager is added succesfully');
        }
         return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
