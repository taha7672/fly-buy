<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function StoreNewslater(Request $request){
        $validated= $request->validate(['email'=>'required|unique:newslaters|',]);
        $data=array();
        $data['email']=$request->email;
        $newslater=DB::table('newslaters')->insert($data);
        $notification=array(
            'messege'=>'Subscribed successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }
}
