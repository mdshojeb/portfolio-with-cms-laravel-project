<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Skill extends Controller
{
    //add skill
    public function show(){
        $skill=DB::table('skill')->get();
        return view('backend.about-me.skills.create',compact('skill'));
    }

    //inserting data to db
    public function insert(Request $request){
        $request->validate([
            'title'=>'required',
            'progress'=>'required'
        ]);
        $insert=DB::table('skill')->insert([
            'title'=>$request->title,
            'progress'=>$request->progress
        ]);
        if($insert){
            $request->session()->flash('msg','Skill Added Successfully');
            return redirect('/add-skill');
        }
    }
    public function delete(Request $request,$id){
        $delete=DB::table('skill')->where('id',$request->id)->delete();
        return redirect('/add-skill');
    }
}
