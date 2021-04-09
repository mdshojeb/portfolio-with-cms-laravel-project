<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service extends Controller
{
    //
    public function show(){
        $data = DB::table('service_section_detail')->get();
        return view('backend.service-section.section-detail',compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            'section_detail'=>'required',
        ]);
        $update=DB::table('service_section_detail')->where('id',$request->id)->update([
            'detail'=>$request->section_detail,
        ]);
        if($update){
            $request->session()->flash('msg','Your Data Saved Successfully');
            return redirect('/service-section');
        }
    }

}
