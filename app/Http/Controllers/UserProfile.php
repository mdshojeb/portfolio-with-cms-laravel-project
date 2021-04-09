<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserAuth;


class UserProfile extends Controller
{
    //retrieving data from database
    public function myaccount(){
        $data=UserAuth::all();
        return view('backend.profile.myaccount',compact('data'));
    }

    //updating user profile 
    public function userupdate(Request $request,$id){
        //validating data
        $request->validate([
            'name'=>'required|min:3|max:30',
            'email'=>'required',
            'image'=>'mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required'=>'Write Who You Are?',
            'email.required'=>'You must put your email address.',
        ]);
        
        if($request->file('image')){
        
            //deleting existing image
            $imageExist=DB::table('users')->where('id',$request->id)->value('image');
            if($imageExist){
                $imagePath=public_path().'/storage/users/'.$imageExist;
                unlink($imagePath);
            }
            
            // customize image name
            $file=$request->file('image')->extension();
            $imageName=time().'.'.$file;
            //storing image
            $request->image->storeAs('/public/users',$imageName);
            //storing data with image
            $update=DB::table('users')->where('id',$request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'image'=>$imageName,
            ]);
            if($update){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/myaccount');
            }else{
                $request->session()->flash('msg','Sorry Something wrong!');
                return redirect('/myaccount');
            }
        }
    }

}
