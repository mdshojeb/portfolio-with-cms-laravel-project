<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    //show main intro data
    public function homepage(){
        //main intro data form db
        $intro=DB::table('intro')->get();

        //about me  data form db
        $about=DB::table('about_me')->get();

        //skills  data form db
        $skill=DB::table('skill')->get();
        return view('frontend.index',compact('intro','skill','about'));
    }
}
