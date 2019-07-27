<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected  $fillable = [
          'name',
          'description',
          'company_id',
          'user_id',];
          
          public function Users(){
         return $this->belongsTo('App\User'); 
        }
    
        public function Projects(){
             return $this->hasMany('App\Project'); 
            }
     
}
