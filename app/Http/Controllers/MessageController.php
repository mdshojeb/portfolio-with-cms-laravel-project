<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\ReplyMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{
    //getting message 
    public function getMessage(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:25',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $message=new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->created_at=Carbon::now('Asia/Dhaka');
        $message->save();

        return redirect('/');
    }

    public function inbox(){
        $message=Message::all();
        $all_msg=count(Message::all());
        $unseen_msg=count(Message::where('status',0)->get());

        return view('backend.message.inbox',compact('message','all_msg','unseen_msg'));
    }

    public function show($id){
        //updating message status - read/unread
        $update_status=Message::findOrFail($id);
        $update_status->status=1;
        $update_status->save();

        $message=Message::where('id',$id)->get();
        return view('backend.message.show',compact('message'));
    }

    public function delete($id){
        $message=Message::findOrFail($id);
        $message->delete();
        session()->flash('success','Your message deleted successfully');
        return redirect('/message/inbox');
       
    }

    public function allMsg(){
        $message=Message::all();
        $all_msg=count(Message::all());
        $unseen_msg=count(Message::where('status',0)->get());

        return view('backend.message.inbox',compact('message','all_msg','unseen_msg'));

    }
    public function unseenMsg(){
        $message=Message::where('status',0)->get();
        $all_msg=count(Message::all());
        $unseen_msg=count(Message::where('status',0)->get());

        return view('backend.message.inbox',compact('message','all_msg','unseen_msg'));

    }

    //replying message

    public function reply(Request $request,$id){
        $request->validate(['msg_body'=>'required']);
       
        //reply address
        $to=$request->mail_address;
        
        //making stardard object 
        $reply = new \StdClass();
        $reply->body = $request->msg_body;

        //sending Mail
        Mail::to($to)->send(new ReplyMail($reply));
        session()->flash('success','Reply has been sent successfully');
        return redirect('/message/inbox');  
    }
}
