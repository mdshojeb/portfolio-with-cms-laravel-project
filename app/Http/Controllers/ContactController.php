<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    //showing edit page
    public function edit(){
        $data=Contact::all();
        return view('backend.contact.contact-edit',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'bg_image'=>'sometimes|image|mimes:jpg,png,jpeg',
        ]);
        $contact=Contact::findOrFail($id);

         if(!empty($request->bg_image)){
            $img=$request->file('bg_image');
            $imageName=uniqid().$img->getClientOriginalName();
             //deleting old image
            if(Storage::disk('public')->exists('image/'.$contact->bg_image)){
                Storage::disk('public')->delete('image/'.$contact->bg_image);   
            }
        }else{
            $imageName=$contact->bg_image;
        }
        //storing new image
        $request->bg_image->storeAs('public/image',$imageName);
         //updating database
         $contact->phone=$request->phone;
         $contact->email=$request->email;
         $contact->address=$request->address;
         $contact->description=$request->description;
         $contact->facebook=$request->facebook;
         $contact->twetter=$request->twetter;
         $contact->linkedin=$request->linkedin;
         $contact->pinterest=$request->pinterest;
         $contact->bg_image=$imageName;
         $contact->save();
       

        //redirecting
        session()->flash('msg','Your contact inforamtion has been updated successfully');
        return redirect('/contact-edit');
    }
}

