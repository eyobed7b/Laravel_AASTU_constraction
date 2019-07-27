<?php

namespace App\Http\Controllers;

use App\Company;


use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $compaines = company::all();
       	$data = array('title'=>'compaines','compaines'=>$compaines);
     
        //return $compaines;   ['companies'=> $compaines] 
        return view('companies/index')->with($data);
     // return view('companies/index', ['companies'=> $compaines] );
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
        //
    }
}
