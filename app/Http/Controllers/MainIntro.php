<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainIntro extends Controller
{
     //Main Intro backend
     public function intropage(){
        $data = DB::table('intro')->get();
        return view('backend.main-intro.intro-page',compact('data'));
    }
     //updating main intro here
     public function update(Request $request,$id){
        //validating data
        $request->validate([
            'intro_title'=>'required',
            'intro_subtitle'=>'required',
            'image'=>'mimes:jpg,jpeg,png|max:2048',
        ]);
        
        if($request->file('image')){
        
            //deleting existing image
            $imageExist=DB::table('intro')->where('id',$request->id)->value('image');
            if($imageExist){
                $imagePath=public_path().'/storage/image/'.$imageExist;
                unlink($imagePath);
            }
            
            // customize image name
            $file=$request->file('image')->extension();
            $imageName=time().'.'.$file;
            //storing image
            $request->image->storeAs('/public/image',$imageName);
            //storing data with image
            $update=DB::table('intro')->where('id',$request->id)->update([
                'intro_title'=>$request->intro_title,
                'intro_subtitle'=>$request->intro_subtitle,
                'image'=>$imageName,
            ]);
            if($update){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/main-intro-edit');
            }else{
                $request->session()->flash('error','Sorry Something wrong!');
                return redirect('/main-intro-edit');
            }
        }
        //updating withour Image
        $update=DB::table('intro')->where('id',$request->id)->update([
            'intro_title'=>$request->intro_title,
            'intro_subtitle'=>$request->intro_subtitle,
        ]);
        if($update){
            $request->session()->flash('msg','Your Data Saved Successfully');
            return redirect('/main-intro-edit');
        }else{
            $request->session()->flash('error','Sorry Something wrong!');
            return redirect('/main-intro-edit');
        }

    }

    


}
