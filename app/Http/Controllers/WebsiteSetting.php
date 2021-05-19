<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebsiteProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class WebsiteSetting extends Controller
{
    public function show(){
        $properties = WebsiteProperty::all();
        return view('backend.setting',compact('properties'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'web_title'=>'required',
            'footer_credit'=>'required',
            'logo'=>'sometimes|image|mimes:jpg,jpeg,png|max:2000',
            'icon'=>'sometimes|image|mimes:jpg,jpeg,png,ico|max:2000'
        ]);
    
        // fatching image
        $properties=WebsiteProperty::findOrFail($id);
        
        if(!empty($request->logo)){
            $img=$request->file('logo');
            $logoName=uniqid().$img->getClientOriginalName();
             //deleting old image
            if(Storage::disk('public')->exists('image/'.$properties->logo)){
                Storage::disk('public')->delete('image/'.$properties->logo);
            }
             //storing new image
            $request->logo->storeAs('public/image',$logoName);
         }else{
             $logoName=$properties->logo;
         }

        //  //updateing favicon 
         if(!empty($request->icon)){
            $img=$request->file('icon');
            $iconName=uniqid().$img->getClientOriginalName();
             //deleting old image
            if(Storage::disk('public')->exists('image/'.$properties->icon)){
                Storage::disk('public')->delete('image/'.$properties->icon);
            }
             //storing new image
            $request->icon->storeAs('public/image',$iconName);
         }else{
             $iconName=$properties->icon;
         }

         $properties->web_title=$request->web_title;
         $properties->footer_credit=$request->footer_credit;
         $properties->logo=$logoName;
         $properties->icon=$iconName;
         if(isset($request->show_logo)){
            $properties->show_logo=1;
         }else{
            $properties->show_logo=0;
         }
         $properties->save();
         session()->flash('msg','Your data saved successfully');
         return redirect('/website-settings');

    }

    //changing password
    public function changePass(Request $request,$id){
        $request->validate([
            'old_password'=>'required|min:8',
            'password'=>'required|min:8|confirmed'
        ]);

        $user= User::find($id);
        $oldPassword=$user->password;
        if(Hash::check($request->old_password, $oldPassword)){
            $new_password=Hash::make($request->password);

            //updating password
           DB::table('users')->update([
               'password'=>$new_password
           ]);

            session()->flash('success','Your password has changed successfully');
            return redirect('/website-settings');
        }
        else{
            session()->flash('error','Please Enter Correct Old Password');
            return redirect('/website-settings');
        }
        
    }
    
}
