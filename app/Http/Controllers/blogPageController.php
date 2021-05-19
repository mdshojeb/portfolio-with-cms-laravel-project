<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogPageController extends Controller
{
    //showing single post
    public function show($id){
      //getting blog from db
      $blog=Post::find($id);

      //getting recent post
      $recent=Post::latest('id')->limit(5)->get();
      return view('frontend.single-blog',compact('blog','recent'));
    }
}
