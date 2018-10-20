<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fiillable = ['user_id' , 'post_id' , 'name'];

    function Post(){
      return $this->belongsTo('App\Post');
    }

    function User(){
      return $this->belongsTo('App/User');
    }
}
