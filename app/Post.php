<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    function autor()
    {
        return $this->belongsTo('App\User', 'autor_id');
    }

    function salvos()
    {
        return $this->belongsToMany('App\Salvo', 'salvos');
    }
}
