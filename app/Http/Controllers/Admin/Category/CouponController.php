<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Coupon(){
        $coupon= DB::table('coupons')->get();
        return view('admin/coupons/coupon', compact('coupon'));
    }
    public function StoreCoupon(Request $request){
        $validated= $request->validate(['coupon'=>'required','discount'=>'required' ]);
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'messege'=>'Coupon added successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    
          }
          public function DeleteCoupon($id){
            DB::table('coupons')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Coupon deleted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    
          }

          public function EditCoupon($id){
            $coupon = DB::table('coupons')->where('id',$id)->first();
            return view('admin/coupons/edit_coupon', compact('coupon'));
            }
            public function UpdateCoupon(Request $request, $id){
                $validated= $request->validate(['coupon'=>'required',
               'discount'=>'required'
            ]);
                $data =array();
                $data['coupon']= $request->coupon;
                $data['discount']= $request->discount;
                $update= DB::table('coupons')->where('id', $id)->update($data);
                    $notification=array(
                        'messege'=>'Coupon Updated successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('coupons')->with($notification);
              }
}
