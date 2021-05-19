<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserAuthentication extends Controller
{
    
    //new user registration 
    public function UserReg(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:30',
            'email'=>'required|unique:users',
            'password'=>'required|min:8',
            'agree'=>'required'
        ],[
            'name.required'=>'Write Who You Are?',
            'email.required'=>'You must put your email address.',
            'email.unique'=>'Opps! Your Email Is Already Exists!',
            'password.required'=>'Please Give An Strong Password',
            'agree.required'=>'You must agree our terms and policy'
        ]);

        //user data inserting to the database
        $pass=Hash::make($request->password);
        $data= array([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $pass,
        ]);
        //Database query
       $insert=UserAuth::insert($data);
       if($insert){
        return redirect('/');
       }
    }

    public function loginPage(){
        if (session()->has('id')) {
            return redirect('/dashboard');
        } else {
            return view('frontend.login');
        }
        
    }

    //check login form data
    public function login(Request $request){
        
           //validating login form data
            $request->validate([
                'email'=>'required',
                'password'=>'required',
            ]);
            //retriving data from database
            $userdata=UserAuth::where('email',$request->email)->value('password');
            $valid=Hash::check($request->password, $userdata);
            
            if($valid!=1){
                $request->session()->flash('msg','Your Email and Password does not exist');
                return redirect('/web-admin');
            }else{
            $userdata=DB::table('users')->where('email',$request->email)->get();
            $request->session()->put([
                'name'=>$userdata[0]->name, 
                'id'=>$userdata[0]->id,
                'role'=>$userdata[0]->role,
                'email'=>$userdata[0]->email,
                'password'=>$request->password,
                'user-img'=>$userdata[0]->image
                ]);

            return redirect('/dashboard');
            } 
    }

    public function logout(Request $request){
        $request->session()->forget('name');
        $request->session()->forget('id');
        $request->session()->forget('password');
        $request->session()->forget('email');
        $request->session()->forget('user-img');
        return redirect('/');
    }

}

