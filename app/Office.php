<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected  $fillable = [
       
        
        'userOrg_id',
        
        ];
    
           public function Company(){
            return $this->hasMany('App\Company'); 
           }
}
