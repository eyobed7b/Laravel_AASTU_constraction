<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected  $fillable = [
          'name',
          'description', 
          'company_id',
          'user_id',
          'office_id'
          ];

          
          public function Users(){
         return $this->belongsToMany('App\User'); 
        }
        public function office(){
            return $this->belongsTo('App\Office'); 
           }
        public function Projects(){
             return $this->hasMany('App\Project'); 
            }
          
            public function comments(){
               return $this->morphMany('App\Comment','commentable'); 
              }
     
}
