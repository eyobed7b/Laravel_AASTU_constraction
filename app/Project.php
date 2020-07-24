<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected  $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'VPM_confirm',
        'PM_confirm',
        'days',
        'letter_position',
        ];
 
   
 
      
 
        public function Company(){
       return $this->belongsTo('App\Company'); 
      }
         public function Users(){
       return $this->belongsToMany('App\User'); 
      }

      public function comments(){
        return $this->morphMany('App\Comment','commentable'); 
       }
       public function ReplayLetter(){
        return $this->belongsTo('App\ReplayLetter'); 
       }
}
