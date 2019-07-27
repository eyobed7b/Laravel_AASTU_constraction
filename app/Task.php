<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected  $fillable = [
       'name',
       'project_id',
       'user_id',
       'days',
       'hours',
       'company_id',];


  public function User(){
      return $this->belongsTo('App/User'); 
     }

       public function Projec(){
      return $this->belongsTo('App/Project'); 
     }

       public function Company(){
      return $this->belongsTo('App/Company'); 
     }

       public function Users(){
      return $this->belongsToMany('App/User'); 
     }
        public function Projects(){
      return $this->belongsToMany('App/Project'); 
     }
}