<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;


class ProjectsController extends Controller
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
            $projects = project::where('user_id', Auth::user()->id)->get();
            $data = array('title'=>'compaines','compaines'=>projects);
      
      
         return view('projects/index')->with($data);
        }
return view('auth.login');
     
     // return view('projects/index', ['projects'=> projects] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        return view('projects.create',['company_id'=>$company_id]);
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
            $project = project::create([
                'name'=>$request->input('name'),
                'company_id'=>$request->input('company_id'),
                'description'=>$request->input('description'),
        
               
               
             'user_id'=>$request->user()->id
               
            ]);

            if($project)
            {
                return redirect()->route('projects.show',['project'=>$project->id])->with('succes','new project is added');
            }
        }
        return back()->withinput()->with('error','can not create new project');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
       $project = project::find($project->id);
//$projects = project::where('project_id',$project->id);
       //return $projects;
       //$data = array('title'=>'projecti','projecti'=>$projecti);
      
   return view('projects.show',['project'=>$project]);//,['projects'=>$projects]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = project::find($project->id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $projectUpdate = project::where('id',$project->id)->update([
            'name'=>$request->input('name'),
            "description"=>$request->input('description')
        ]);
        if($projectUpdate){
            return redirect()->route('projects.show',['project'=>$project->id])->with('succes','project updated succesfully');
        }
         return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findproject = project::find($project->id);
        if($findproject->delete()){
            return redirect()->route('projects.index')->with('success','project deleted successfuly');
        }
        return back()->withInput()->with('error','project could not be deleted');
    }
}
