<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
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

        //services
        $service=DB::table('services')->get();

        //couner data
        $counter=DB::table('counter')->get();

        //portfolio item
        $portfolio=DB::table('portfolios')->orderby('id','desc')->get();

        //blog
        $blog=Post::all();

        //contact
        $contact=Contact::all();

        //reviews 
        $review=DB::table('reviews')->orderby('id','desc')->get();
        $r_bg=DB::table('bg_images')->get();
        $c_bg=Contact::all();
        return view('frontend.index',compact('c_bg','blog','intro','skill','about','service','counter','portfolio','review','r_bg','contact'));
    }
}
