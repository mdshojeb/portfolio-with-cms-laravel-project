<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //message 
        $message=Message::orderby('id','desc')->limit(10)->get();
        return view('backend.dashboard',compact('message'));
    }
}
