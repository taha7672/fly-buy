<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReturnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function ReturnRequest(){
       $return= DB::table('orders')->where(['return_order'=>1])->get();
        return view('admin.return.return_request', compact('return'));
    }
    public function AcceptRequest($id){
        DB::table('orders')->where('id', $id)->update(['return_order'=>2]);
        $notification=array(
            'messege'=>'Return Request Accepted successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function AllReturn(){
        $return= DB::table('orders')->where(['return_order'=>2])->get();
        return view('admin.return.all_return', compact('return'));

    }
}
