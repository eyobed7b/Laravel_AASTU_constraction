<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','city','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   

     public function tasks(){
      return $this->hasMany('App\Task'); 
     }

       public function comments(){
      return $this->morphMany('App\Comment','commentable'); 
     }
       public function Role(){
      return $this->belongsTo('App\Role'); 
     }
       public function Companies(){
      return $this->belongsToMany('App\Company'); 
     }

 public function Task(){
      return $this->belongsToMany('App\Task'); 
     }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     
}
