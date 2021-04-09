<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutMe extends Controller
{
      //Main Intro backend
      public function show(){
        $data = DB::table('about_me')->get();
        return view('backend.about-me.about.about-me',compact('data'));
    }
    
     //updating main intro here
     public function update(Request $request,$id){
        //validating data
        $request->validate([
            'name'=>'required',
            'profile'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'about_detail'=>'required',
            'image'=>'mimes:jpg,jpeg,png|max:2048',
        ]);
        
        if($request->file('image')){
        
            //deleting existing image
            $imageExist=DB::table('about_me')->where('id',$request->id)->value('image');
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
            $update=DB::table('about_me')->where('id',$request->id)->update([
                'name'=>$request->name,
                'profile'=>$request->profile,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'about_detail'=>$request->about_detail,
                'image'=>$imageName,
            ]);
            if($update){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/about-me');
            }else{
                $request->session()->flash('error','Sorry Something wrong!');
                return redirect('/about-me');
            }
        }
        //updating withour Image
        $update=DB::table('about_me')->where('id',$request->id)->update([
                'name'=>$request->name,
                'profile'=>$request->profile,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'about_detail'=>$request->about_detail,
        ]);
        if($update){
            $request->session()->flash('msg','Your Data Saved Successfully');
            return redirect('/about-me');
        }else{
            $request->session()->flash('error','Sorry Something wrong!');
            return redirect('/about-me');
        }

    }
}