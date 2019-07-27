<?php

namespace App\Http\Controllers;

use App\Company;


use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $compaines = company::where('user_id', Auth::user()->id)->get();
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
            $company = company::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
        
               
               
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
//$projects = project::where('company_id',$company->id);
       //return $projects;
       //$data = array('title'=>'companyi','companyi'=>$companyi);
      
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
