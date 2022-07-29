<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function tags(){
        return $this->belongsToMany('App\Tag', 'post_tags');
    }
}
