<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\office;



use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function adduser(Request $request ){
       $company = Company::find($request->input('company_id'));
         if(Auth::user()->id)
       {

        $user = User::where('email' ,$request->input('email') )->first();
        

        if($user)
        {
            $user_role = user::where('email',$request->input('email'))->update([
                'role_id'=> 8,
            ]);
          
            $company->Users()->attach($user->id);
    
            return redirect()->route('companies.show',['company'=>$company->id])
            ->with('succes',$request->input('email') .'new user is added to the company');
        }

        
       }
       return redirect()->route('companies.show',['company'=>$company->id])
       ->with('error','error adding user to the company');

     }

    public function index()
    {
        if(Auth::check())
        {
                  
            if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
            {
                $compaines = company::all();
                $data = array('title'=>'compaines','compaines'=>$compaines);
                return view('companies/index')->with($data);
            }else if(Auth::user()->role_id == 7 ){
                $compaines = DB::table('offices')->join('companies','offices.id','companies.office_id')
               ->join('users','users.id','offices.userOrg_id')->where('offices.userOrg_id',Auth::user()->id)
                ->select('companies.name','companies.id')->get();
//return  $compaines;
                return view('companies.index',['compaines'=>  $compaines,'title'=>'Companies']);
            }else if(Auth::user()->role_id == 9){
                $compaines = DB::table('company_user')
                ->join('companies','company_user.company_id','companies.id')->where('company_user.user_id',Auth::user()->id)
                 ->select('companies.name','companies.id')->get();
 //return  $compaines;
                 return view('companies.index',['compaines'=>  $compaines,'title'=>'Companies']);
            }
            

         
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
        $users = user::all();
        $offices = office::all();
        $users = DB::table('users')->join('offices','offices.userOrg_id','users.id')
                    ->select('users.first_name','users.last_name','offices.id')->get();
                  
    
   
        return view('companies.create',['users'=>$users]);
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
            $company = company::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'office_id'=>$request->input("office_no"),
               
               
             'user_id'=>$request->user()->id
               
            ]);

            if($company)
            {
                return redirect()->route('companies.show',['company'=>$company->id])->with('succes','new company is added');
            }
        }
        return back()->withinput()->with('error','can not create new company');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
       
       $company = company::find($company->id);
      
    
    
   return view('companies.show',['company'=>$company]);//,['projects'=>$projects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
        $company = company::find($company->id);
        return view('companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $companyUpdate = company::where('id',$company->id)->update([
            'name'=>$request->input('name'),
            "description"=>$request->input('description')
        ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])->with('succes','company updated succesfully');
        }
         return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany = company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')->with('success','company deleted successfuly');
        }
        return back()->withInput()->with('error','company could not be deleted');
    }
}
