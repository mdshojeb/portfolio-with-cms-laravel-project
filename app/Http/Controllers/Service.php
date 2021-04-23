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
    //add service 
    public function store(Request $request){
        $request->validate([
            'service_title'=>'required',
            'detail'=>'required',
            'icon'=>'required',
        ]);
        $store=DB::table('services')->insert([
            'services_title'=>$request->service_title,
            'detail'=>$request->detail,
            'icon'=>$request->icon,
        ]);
        if($store){
            $request->session()->flash('msg','Your Service Saved Successfully');
            return redirect('/service-list');
        }
    }

    //show service list
    public function listing(){
        $data = DB::table('services')->get();
        return view('backend.service-section.services.list',compact('data'));
    }

    //edit page for updating services
    public function edit(Request $request,$id){
        $data = DB::table('services')->where('id',$request->id)->get();
        return view('backend.service-section.services.edit',compact('data'));
    }

    //updating services data
    public function servicUpdate(Request $request,$id){
        $input=['title'=>$request->service_detail,'detail'=>$request->detail,'icon'=>$request->icon];
        if (isset($input)) {
            $request->validate([
                'service_title'=>'required',
                'detail'=>'required',
                'icon'=>'required',
            ]);
            $update=DB::table('services')->where('id',$request->id)->update([
                'services_title'=>$request->service_title,
                'detail'=>$request->detail,
                'icon'=>$request->icon,
            ]);
            if($update){
                $request->session()->flash('msg','Your Service Updated Successfully');
                return redirect('/service-list');
            }
        }
        return redirect('/service-list');

    }

    //deleting service 
    public function delete(Request $request,$id){
        $delete = DB::table('services')->where('id',$request->id)->delete();
        if($delete){
            $request->session()->flash('msg','Your Service deleted Successfully');
            return redirect('/service-list');
        }
    }

}

//
