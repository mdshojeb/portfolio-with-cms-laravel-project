<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostStatusController extends Controller
{
    //
    public function published(){
       $allcount=count(Post::all());
       $posts=Post::where('status',1)->get();
       $p_count=count(Post::where('status',1)->get());
       $up_count=count(Post::where('status',0)->get());
       return view('backend.posts.index',compact('posts','p_count','allcount','up_count'));
        
    }

    public function unpublished(){
        $allcount=count(Post::all());
        $p_count=count(Post::where('status',1)->get());
        $posts=Post::where('status',0)->get();
        $up_count=count($posts);
        return view('backend.posts.index',compact('posts','up_count','allcount','p_count'));
    }
}
