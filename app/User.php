<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name'] ;

    function Posts(){
      return $this->hasMany('App\Post');
    }

    function Images(){
      return $this->hasMany('App\Image');
    }
}
