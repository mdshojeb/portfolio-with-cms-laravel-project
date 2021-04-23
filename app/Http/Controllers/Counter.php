<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Counter extends Controller
{
    //taking data from database and show it 
    public function show(){
        $data=DB::table('counter')->get();
        return view('backend.counter',compact('data'));
    }

     //updating main intro here
     public function update(Request $request,$id){
        $input= $request->all();
        
        if (isset($input)) {
            // validating data
            $request->validate([
                'work_complete'=>'required',
                'year_of_experience'=>'required',
                'total_clients'=>'required',
                'awered_won'=>'required',
                'image'=>'mimes:jpg,jpeg,png|max:2048',
            ]);
            
            if($request->file('image')){
            
                    //deleting existing image
                    $imageExist=DB::table('counter')->where('id',$request->id)->value('image');
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
                    $update=DB::table('counter')->where('id',$request->id)->update([
                        'workes_completed'=>$request->work_complete,
                        'years_of_experience'=>$request->year_of_experience,
                        'total_clients'=>$request->total_clients,
                        'awered_won'=>$request->awered_won,
                        'image'=>$imageName,
                    ]);
                    if($update){
                        $request->session()->flash('msg','Your Data Saved Successfully');
                        return redirect('/counter-section');
                    }else{
                        $request->session()->flash('error','Sorry Something wrong!');
                        return redirect('/counter-section');
                    }
                }
                //updating withour Image
                $update=DB::table('counter')->where('id',$request->id)->update([
                    'workes_completed'=>$request->work_complete,
                    'years_of_experience'=>$request->year_of_experience,
                    'total_clients'=>$request->total_clients,
                    'awered_won'=>$request->awered_won,
                ]);
                if($update){
                    $request->session()->flash('msg','Your Data Saved Successfully');
                    return redirect('/counter-section');
                }else{
                    $request->session()->flash('error','Sorry Something wrong!');
                    return redirect('/counter-section');
                }
            }
            //if not isset form element
            return redirect('/counter-section');

    }
}
