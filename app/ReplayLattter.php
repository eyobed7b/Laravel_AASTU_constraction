<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ReplayLattter extends Model
{

    protected  $fillable = [
 
        'letter_id',
        'description',
        'company_id',
        'user_id',
        'letter_position',
        ];
 
   
 
      
 
        public function Company(){
       return $this->belongsTo('App\Company'); 
      }
         public function Users(){
       return $this->belongsToMany('App\User'); 
      }

      public function commentReplays(){
        return $this->morphMany('App\Comment','commentable'); 
       }
       public function Projectr(){
        return $this->belongsTo('App\Project'); 
       }
}
