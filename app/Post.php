<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title' , 'body' , 'user_id'];

    function User(){
      return $this->belongsTo('App\User');
    }

    function Image(){
      return $this->hasOne('App\Image');
    }
}
