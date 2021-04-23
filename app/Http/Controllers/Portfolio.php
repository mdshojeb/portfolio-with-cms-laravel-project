<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Portfolio extends Controller
{
    //inserting portfolio data
    public function create(Request $request){
        //validating data
        $request->validate([
            'title'=>'required',
            'catagory'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        
            // customize image name
            $file=$request->file('image')->extension();
            $imageName=time().'.'.$file;
            //storing image
            $request->image->storeAs('/public/image/portfolio',$imageName);
            //storing data with image
            $insert=DB::table('portfolios')->insert([
                'title'=>$request->title,
                'catagory'=>$request->catagory,
                'image'=>$imageName,
            ]);
            if($insert){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/portfolio-list');
            }else{
                $request->session()->flash('msg','Sorry Something wrong!');
                return redirect('/portfolio-list');
            }
        }

        public function listing(){
            $portfolio=DB::table('portfolios')->get();
            return view('backend.portfolio.list',compact('portfolio'));
        }

        //deleting portfolio
        public function delete(Request $request,$id){
            $delete=DB::table('portfolios')->where('id',$request->id)->delete();
            if($delete){
                $request->session()->flash('msg','Your Data Saved Successfully');
                return redirect('/portfolio-list');
            }
        }
}
