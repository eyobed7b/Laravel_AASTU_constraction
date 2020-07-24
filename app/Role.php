<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected  $fillable = [
       'name',
      'user_id',
      ];

       public function Users(){
      return $this->hasMany('App\User'); 
     }
       
}
  
