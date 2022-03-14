<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function neworder(){
        $order= DB::table('orders')->where('status', 0)->get();
        // dd($order);
        return \view('admin/orders/pending', compact('order'));

    }
    public function  Vieworder($id){
        $order=DB::table('orders')
        ->join('users', 'orders.user_id','users.id')
        ->select('orders.*','users.name', 'users.phone')
        ->where('orders.id', $id)
        ->first();
        // dd($order);
        $shipping=DB::table('shipping')->first();
        $details=DB::table('orders_details')
        ->join('products','orders_details.product_id','products.id')
        ->select('orders_details.*','products.product_code', 'products.image_one' )
        ->where('orders_details.order_id',$id)
        ->get();
        return view('admin.orders.view_order', compact('order','shipping','details'));
    }
    public function AcceptPayment($id){
        DB::table('orders')->where('id', $id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Payment Accepted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('pending.payment')->with($notification);
    }
    public function CancelPayment($id){
        DB::table('orders')->where('id', $id)->update(['status'=>4]);
        $notification=array(
            'messege'=>'Payment Canceled',
            'alert-type'=>'success'
             );
           return Redirect()->route('pending.payment')->with($notification);
    }
    public function acceptedPay(){
      $order=  DB::table('orders')->where('status', 1)->get();
        return view('admin.orders.pending', compact('order'));
    }
    public function progressPay(){
      $order=  DB::table('orders')->where('status', 2)->get();
      return view('admin.orders.pending', compact('order'));

    }
    public function deliveredOr(){
        $order=DB::table('orders')->where('status', 3)->get();
        return view('admin.orders.pending', compact('order'));

    }
    public function cancelOr(){
       $order= DB::table('orders')->where('status', 4)->get();
       return view('admin.orders.pending', compact('order'));

    }
   public function processDel($id){
    DB::table('orders')->where('id', $id)->update(['status'=>2]);
    $notification=array(
        'messege'=>'Send to delivery',
        'alert-type'=>'success'
         );
       return Redirect()->route('pending.payment')->with($notification);
   }
   public function deliverDone($id){
       $product= Db::table('orders_details')->where('order_id', $id)->get();
       foreach($product as $row){
           DB::table('products')
           ->where('id', $row->product_id)
           ->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity)]);
       }
    DB::table('orders')->where('id', $id)->update(['status'=>3]);
    $notification=array(
        'messege'=>'Send to delivery',
        'alert-type'=>'success'
         );
       return Redirect()->route('pending.payment')->with($notification);
   }

    







}
