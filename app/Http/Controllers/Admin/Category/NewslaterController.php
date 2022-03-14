<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewslaterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Newslater(){
        $news= DB::table('newslaters')->get();
        return view('admin/coupons/newslater', compact('news'));
    }
    public function DeleteNewslater($id){
        $news=DB::table('newslaters')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Newslater deleted successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }
}
