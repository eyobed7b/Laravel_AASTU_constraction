<?php

namespace App\Http\Controllers;
use App\ReplayLattter;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\DB;
class ReplayLetterController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
           
                if(Auth::user()->role_id == 7 )
            {
                $ReplayLetter = DB::table('companies')->join('ReplayLattters','companies.id','ReplayLattters.company_id')
                ->join('offices','offices.id','companies.office_id')
                ->where('offices.userOrg_id',Auth::user()->id && 'ReplayLattters','<=',Auth::user()->role_id )
                ->select('ReplayLattters.name','ReplayLattters.id','ReplayLattters.letter_position')->get();
              //  $data = array('title'=>'ReplayLattterLetter','ReplayLattterLetter'=>$ReplayLattterLetter);
      
     
         return view('ReplayLetter/index',['title'=>'ReplayLetter','ReplayLetter'=>$ReplayLetter]); 
            }
            else if(Auth::user()->role_id){
                $ReplayLetter = DB::table('replay_lattters')->where('letter_position','<=',Auth::user()->role_id)
                ->select('id','description')->get();
              //  ReplayLattter::where('letter_position','<=',Auth::user()->role_id);
              $data = array('title'=>'ReplayLetter','ReplayLetter'=>$ReplayLetter);

          
         return view('ReplayLetter/index',['title'=>'ReplayLetter','ReplayLetter'=>$ReplayLetter]); 
            }
            
        }
 return view('auth.login');
     
     // return view('ReplayLattterLetter/index', ['ReplayLattterLetter'=> ReplayLattterLetter] );
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
          if(Auth::user()->role_id == 8)
          {
            $companies = company::all();
            $companie = Auth::user()->company;
            return view('ReplayLattterLetter.create',['company_id'=>$company_id,'companies'=>$companie]);
          }
         
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
       // return  $request->input('company_id');
       // return $request->input('ld_letter');
       // return  $request->input('company_id');
       
        if(Auth::check()){
           
            $project_id = $request->input('company_id');
        
         $company = Project::find( $project_id );
      

            $ReplayLattter = ReplayLattter::create([
              
                'company_id'=>$company->company_id,
                'description'=>$request->input('description'),
                'letter_position'=>$request->input('letter_position'),
                'letter_id'=>$request->input('company_id'),
                'user_id'=>$request->user()->id,
               
               
            ]);

            if($ReplayLattter)
            {
                return redirect()->route('ReplayLetter.show',['ReplayLattter'=>$ReplayLattter->id])->with('succes','new ReplayLattter is added');
            }
        }
        return back()->withinput()->with('error','can not create new ReplayLattter');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReplayLattter  $ReplayLattter
     * @return \Illuminate\Http\Response
     */
    public function show(ReplayLattter $ReplayLattter)
    {
 
        if(Auth::user()->role_id>=$ReplayLattter->letter_position){
           if(Auth::user()->role_id==7){
                $company = DB::table('companies')->join('ReplayLattterLetter','companies.id','ReplayLattterLetter.company_id')
        ->join('offices','offices.id','companies.office_id')
        ->where('offices.userOrg_id',Auth::user()->id && 'ReplayLattterLetter.leter_position','<=',Auth::user()->role_id)
        ->select('ReplayLattterLetter.id','ReplayLattterLetter.name','ReplayLattterLetter.description','ReplayLattterLetter.company_id')->get();
                
                 
        
           if($ReplayLattter->company_id== $company[0]->id){
                   
                    $comments = $ReplayLattter->comments;
                    return view('ReplayLattterLetter.show',['ReplayLattter'=>$ReplayLattter,'comments'=>$comments ]);
                 }
            }

            $ReplayLattter = ReplayLattter::find($ReplayLattter->id);
                $comments = $ReplayLattter->comments;
                return view('ReplayLattterLetter.show',['ReplayLattter'=>$ReplayLattter,'comments'=>$comments ]);
         }else if (Auth::user()->role_id<$ReplayLattter->letter_position){
            return "no ReplayLattter";
           }else if(Auth::user()->role_id==2){
                $ReplayLattter = ReplayLetter::find($ReplayLattterLattter->id);
            
                    $comments = $ReplayLattterLattter->comments;
                    return view('ReplayLetter.show',['ReplayLattter'=>$ReplayLattter,'comments'=>$comments ]);
            }
            else{
                return "no ReplayLattter";
            }   
        

        
       $ReplayLattter = ReplayLattter::find($ReplayLattter->id);
       $comments = $ReplayLattter->comments;
      
   return view('ReplayLattterLetter.show',['ReplayLattter'=>$ReplayLattter,'comments'=>$comments ]);//,['ReplayLattterLetter'=>$ReplayLattterLetter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReplayLattter  $ReplayLattter
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplayLattter $ReplayLattter)
    {
        $ReplayLattter = ReplayLattterLetter::find($ReplayLattter->id);
        return view('ReplayLattterLetter.edit',['ReplayLattter'=>$ReplayLattter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReplayLattter  $ReplayLattter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReplayLattter $ReplayLattter)
    {
       if(Auth::user()->role_id==  $ReplayLattter->letter_position ){
       
        $ReplayLattterUpdate = ReplayLattter::where('id',$ReplayLattter->id)->update([
            'letter_position'=>($request->input('letter_position')+1),
           
        ]);
      //  return $ReplayLattterUpdate->letter_position;
        if($ReplayLattterUpdate){
            return redirect()->route('ReplayLattterLetter.index',['ReplayLattter'=>$ReplayLattter->id])->with('succes','ReplayLattter accepted succesfully');
        }
       }else if(Auth::user()->role_id==6){
        $ReplayLattterUpdate = ReplayLattter::where('id',$ReplayLattter->id)->update([
            'Off_confirm'=>$request->input('office'),
           
        ]);
        if($ReplayLattterUpdate){
            return redirect()->route('ReplayLattterLetter.index',['ReplayLattter'=>$ReplayLattter->id])->with('succes','ReplayLattter accepted succesfully');
        }
       }
       
       
        if( $request->input('PM_confirm')>=1 )
        {

            if(Auth::user()->role_id == 3){
                $ReplayLattterUpdate = ReplayLattter::where('id',$ReplayLattter->id)->update([
                    'PM_confirm'=>$request->input('PM_confirm'),
                   
                ]);
                if($ReplayLattterUpdate){
                    return redirect()->route('ReplayLattterLetter.index',['ReplayLattter'=>$ReplayLattter->id])->with('succes','ReplayLattter accepted succesfully');
                }

            }else if(Auth::user()->role_id == 4)
            {
                if($ReplayLattter->PM_confirm == 1)
                {
                    $ReplayLattterUpdate = ReplayLattter::where('id',$ReplayLattter->id)->update([
                        'VPM_confirm'=>$request->input('VPM_confirm'),
                       
                    ]);
                    if($ReplayLattterUpdate){
                       
                        return redirect()->route('ReplayLattterLetter.index',['ReplayLattter'=>$ReplayLattter->id])->with('succes','ReplayLattter accepted succesfully');
                    }
                }
                
            }
            
            
        }
        else{
            $ReplayLattterUpdate = ReplayLattter::where('id',$ReplayLattter->id)->update([
                'name'=>$request->input('name'),
                "description"=>$request->input('description')
            ]);
            if($ReplayLattterUpdate){
                return redirect()->route('ReplayLattterLetter.show',['ReplayLattter'=>$ReplayLattter->id])->with('succes','ReplayLattter updated succesfully');
            }

        }
        
         return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReplayLattter  $ReplayLattter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplayLattter $ReplayLattter)
    {
        $findReplayLattter = ReplayLattter::find($ReplayLattter->id);
        if($findReplayLattter->delete()){
            return redirect()->route('ReplayLattterLetter.index')->with('success','ReplayLattter deleted successfuly');
        }
        return back()->withInput()->with('error','ReplayLattter could not be deleted');
    }
}
