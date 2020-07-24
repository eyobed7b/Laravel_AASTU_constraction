<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    protected  $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type',];
 
         public function commentable()
         {
 
             return $this->morphTo();
         }
 
 
         public function user()
         {
 
             return $this->hasOne('\App\user','id','user_id');
         }
}
