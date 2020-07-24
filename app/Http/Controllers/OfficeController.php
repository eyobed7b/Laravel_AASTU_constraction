<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\company;
use App\office;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\DB;

class OfficeController extends Controller
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
                   'role_id'=> 8,]);
                   if($userUpdate){
                    $office = User::where('email',$request->input('email'));
                   
                    return redirect()->route('office.index')->with('succes','
                    {{$office}}Project manager is removed succesfully');
                }

             }
          $data = array('users'=>'user','user'=>$user);
         
          $office_no = $request->input('office_no');
             return view('office.edite',['office_no'=>$office_no] )->with($data);
         }
 
         
     
    
 
      }
 
    public function index()
    {
        $user = user::all();
       
       $users = DB::table('users')->join('offices','offices.userOrg_id','users.id')
       ->select('users.first_name','users.last_name','offices.id')->get();
    

        return view('office/index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
    
        $users = user::where('role_id', 9)->get();
        $data = array('title'=>'users','users'=> $users);
        // $data = array('Users'=>'user','user'=>$user);
       // return $data;
         return view('office/create')->With($data);
        }
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
    
            $office = office::create([
                'userOrg_id'=>$request->input('userOrg_id'),
           
               
            ]);
            if($office)
            {
                $userUpdate = User::where('id',$request->input('userOrg_id'))->update([
                    'role_id'=> 7,]);
                return redirect()->route('office.show',['office'=>$office->id])->with('succes','new project is added');
            }

            }
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show( Office $office)
    {
        
       
        $office = office::find($office->id);
        $user = DB::table('offices')->join('users','offices.userOrg_id','users.id')
        ->select('users.first_name','users.last_name','offices.id')->where('offices.id',$office->id)->get();
      //  return  $users;
      $companies = DB::table('companies')->join('offices','offices.id','companies.office_id')
      ->select('companies.name','companies.description','companies.id')->where('companies.office_id',$office->id)->get();;
     //  return $companies;
    return view('office.show',['user'=>$user,'companies'=>$companies]);//,['projects'=>$projects]);
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
      
        return view('office.edite',['users'=>$users]);
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
       
      if($request->input('office_no')=="office_one")
      {
        $userUpdate = User::where('email',$request->input('email'))->update([
            'role_id'=> 5,  ]);
      }
      if($request->input('office_no')=="office_two")
      {
        $userUpdate = User::where('email',$request->input('email'))->update([
            'role_id'=> 6,  ]);
      }
           
      
        if($userUpdate){
            $office = User::where('email',$request->input('email'));
            return redirect()->route('office.index')->with('succes','
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
