<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ContactPage(){
        return view('pages.contact');
    }
    public function ContactForm(Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['message']=$request->message;
        DB::table('contacts')->insert($data);
        $notification=array(
            'messege'=>'Message Sent Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function  ContactMessage(){
        $message= DB::table('contacts')->get();
        return view('admin.message.all_message', compact('message'));
    }
   
}
