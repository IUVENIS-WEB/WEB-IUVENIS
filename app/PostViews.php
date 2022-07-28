<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostViews extends Model
{
    public static function createViewLog($post)
    {
        $postsViews = new PostViews();
        $postsViews->id_post = $post->id;
        $postsViews->titleslug = $post->titleslug;
        $postsViews->url = Request::url();
        $postsViews->session_id = Request::getSession()->getId();
        $postsViews->user_id = Auth::user()->id;
        $postsViews->ip = Request::getClientIp();
        $postsViews->agent = Request::header('User-Agent');
        $postsViews->save();
    }
}
