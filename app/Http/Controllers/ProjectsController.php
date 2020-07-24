<?php

namespace App\Http\Controllers;

use App\project;
use App\company;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\DB;


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
        {           if(Auth::user()->role_id == 7 )
            {
               // return "hello";
                $projects = DB::table('companies')->join('projects','companies.id','projects.company_id')
                ->join('offices','offices.id','companies.office_id')->where('offices.userOrg_id',Auth::user()->id)
                ->select('projects.name','projects.id')->get();
              //  $data = array('title'=>'projects','projects'=>$projects);
      
      
         return view('projects/index',['title'=>'projects','projects'=>$projects]); 
            }

        
         else if(Auth::user()->role_id ==8  ){
                $projects = DB::table('company_user')->join('projects','company_user.company_id','projects.company_id')
                ->join('users','company_user.user_id','users.id')->where('company_user.user_id',Auth::user()->id)
                 ->select('projects.name','projects.id')->get();
                 $data = array('title'=>'projects','projects'=>$projects);
         return view('projects/index',['title'=>'projects','projects'=>$projects]); 
            }
            
            $projects = project::where('letter_position','>=',Auth::user()->role_id)->get();
                $data = array('title'=>'projects','projects'=>$projects);
      
    
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
    public function create( $company_id = null )
    {
      $companies = null;
      if(!$company_id)
      {
          if(Auth::user()->role_id == 2)
          {
            $companies = company::all();
            return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
          }
          if(Auth::user()->role_id > 1)
          {
            $companies = company::where('user_id',Auth::user()->id)->get();

          }
      }
      return  $companies ;
        return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);

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
           // return $request->input('position');
            $project = project::create([
                'name'=>$request->input('name'),
                'company_id'=>$request->input('company_id'),
                'description'=>$request->input('description'),
                'letter_position'=>$request->input('position'),
                'days'=>$request->input('days'),
               
               
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
        $comments = $project->comments;
        
        if(Auth::user()->role_id<=$project->letter_position){
            
               
                return view('projects.show',['project'=>$project,'comments'=>$comments ]);
            }else if (Auth::user()->role_id>$project->letter_position){
            return "no Project";}
    else if(Auth::user()->role_id==8){
            $company = DB::table('company_user')->join('companies','company_user.company_id','companies.id')
            ->join('users','company_user.user_id','users.id')->where('company_user.user_id',Auth::user()->id )
             ->select('companies.id')->get();
             //return   $company;
   
              if($project->company_id == $company[0]->id){
                $comments = $project->comments;
                return view('projects.show',['project'=>$project,'comments'=>$comments ]);
             

              }
            }else if(Auth::user()->role_id==7){
                $company = DB::table('companies')->join('projects','companies.id','projects.company_id')
                ->join('offices','offices.id','companies.office_id')->where('offices.userOrg_id',Auth::user()->id && 'projects.company_id'== $project->company_id)
                 ->select('projects.id','projects.PM_confirm','projects.VPM_confirm','projects.CO_confirm','projects.Off_confirm')->get();
                
                 if($company){
                   
                    $comments = $project->comments;
                    return view('projects.show',['project'=>$project,'comments'=>$comments ]);
                 }
            }
            else{
                return "no Project";
            }   
        

        
       $project = project::find($project->id);
       $comments = $project->comments;
      
   return view('projects.show',['project'=>$project,'comments'=>$comments ]);//,['projects'=>$projects]);
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
       if(Auth::user()->role_id==  $project->letter_position ){
       
        $projectUpdate = project::where('id',$project->id)->update([
            'letter_position'=>($request->input('letter_position')+1),
           
        ]);
      //  return $projectUpdate->letter_position;
        if($projectUpdate){
            return redirect()->route('projects.index',['project'=>$project->id])->with('succes','project accepted succesfully');
        }
       }else if(Auth::user()->role_id==6){
        $projectUpdate = project::where('id',$project->id)->update([
            'Off_confirm'=>$request->input('office'),
           
        ]);
        if($projectUpdate){
            return redirect()->route('projects.index',['project'=>$project->id])->with('succes','project accepted succesfully');
        }
       }
       
       
        if( $request->input('PM_confirm')>=1 )
        {

            if(Auth::user()->role_id == 3){
                $projectUpdate = project::where('id',$project->id)->update([
                    'PM_confirm'=>$request->input('PM_confirm'),
                   
                ]);
                if($projectUpdate){
                    return redirect()->route('projects.index',['project'=>$project->id])->with('succes','project accepted succesfully');
                }

            }else if(Auth::user()->role_id == 4)
            {
                if($project->PM_confirm == 1)
                {
                    $projectUpdate = project::where('id',$project->id)->update([
                        'VPM_confirm'=>$request->input('VPM_confirm'),
                       
                    ]);
                    if($projectUpdate){
                       
                        return redirect()->route('projects.index',['project'=>$project->id])->with('succes','project accepted succesfully');
                    }
                }
                
            }
            
            
        }
        else{
            $projectUpdate = project::where('id',$project->id)->update([
                'name'=>$request->input('name'),
                "description"=>$request->input('description')
            ]);
            if($projectUpdate){
                return redirect()->route('projects.show',['project'=>$project->id])->with('succes','project updated succesfully');
            }

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
