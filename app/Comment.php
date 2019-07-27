<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_tabl extends Model
{
   protected  $fillable = [
       'body',
       'url',
       'user_id',
       'commentable_id',
        'commentable_type',];

        public function commentable()
        {

            return $this->morphTo();
        }
}
