<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostViews extends Model
{
    public static function createViewLog($post)
    {
        $user = Auth::user();
        $postsViews = new PostViews();
        $postsViews->post_id = $post->id;
        $postsViews->url = request()->url();
        $postsViews->session_id = request()->getSession()->getId();
        $postsViews->user_id = isset($user)? $user->id : null;
        $postsViews->ip = request()->getClientIp();
        $postsViews->agent = request()->header('User-Agent');
        $postsViews->save();
    }
}
