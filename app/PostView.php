<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class PostView extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public static function createViewLog($post) {
        $postViews= new PostView();
        $postViews->listing_id = $post->id;
        $postViews->url = Request::url();
        $postViews->session_id = Request::getSession()->getId();
        $postViews->user_id = (Auth::check())? Auth::id():null;
        $postViews->ip = Request::getClientIp();
        $postViews->agent = Request::header('User-Agent');
        $postViews->save();
    }
}
