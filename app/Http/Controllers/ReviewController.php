<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
      //inserting review data
      public function create(Request $request){
        //validating data
        $request->validate([
            'name'=>'required',
            'review'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        
            // customize image name
            $file=$request->file('image')->extension();
            $imageName=time().'.'.$file;
            //storing image
            $request->image->storeAs('/public/image',$imageName);
            //storing data with image
            $insert=DB::table('reviews')->insert([
                'name'=>$request->name,
                'review'=>$request->review,
                'image'=>$imageName,
            ]);
            if($insert){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/review-list');
            }else{
                $request->session()->flash('msg','Sorry Something wrong!');
                return redirect('/review-list');
            }
        }

        public function listing(){
            $review=DB::table('reviews')->get();
            return view('backend.review.list',compact('review'));
        }

        //deleting portfolio
        public function delete(Request $request,$id){
            $delete=DB::table('reviews')->where('id',$request->id)->delete();
            if($delete){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/review-list');
            }
        }


        //review section background image
        public function index(){
            $image=DB::table('bg_images')->get();
            return view('backend.review.review-bg',compact('image'));
        }

        public function updateBg(Request $request,$id){
            $request->validate([
                'image'=>'mimes:jpg,jpeg,png|max:2048',
            ],[
                'image.required'=>'You must have a background image.',
            ]);
            
            if($request->file('image')){
            
                //deleting existing image
                $imageExist=DB::table('bg_images')->where('id',$request->id)->value('image');
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
                $update=DB::table('bg_images')->where('id',$request->id)->update([
                    'image'=>$imageName,
                ]);
                if($update){
                    $request->session()->flash('msg','Your Data Saved Successfully');
                    return redirect('/review-bg-edit');
                }else{
                    $request->session()->flash('msg','Sorry Something wrong!');
                    return redirect('/review-bg-edit');
                }
            }else{
                return redirect('/review-bg-edit');
            }
        }

}

