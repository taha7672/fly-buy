<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Exception\UnclosedComment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
class CartController extends Controller
{
    public function addtocart($id){
        $product=DB::table('products')->where('id',$id)->first();

        $data = array(); 
        $data['id']= $product->id;
        $data['name']= $product->product_name;
        $data['qty']= 1;
        $data['price']= $product->discount_price;
        $data['weight']= 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['size'] = '';
        $data['options']['color'] = '';
        Cart::add($data);
        return \Response::json(['success' => 'Successfully Added on your Cart']);

}
public function check(){
    $content=Cart::content();
    return response()::json($content);
}
public function ShowCart(){
  $cart=  Cart::content();
  return \view('pages.cart', compact('cart')); 

}
public function RemoveCart($rowId){
    Cart::remove($rowId);
    $notification=array(
        'messege'=>'Product Removed from Cart',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
}
public function UpdateCart(Request $request){
    $rowId= $request->productid;
    $qty= $request->qty;
    Cart::update($rowId,$qty);
    $notification=array(
        'messege'=>'Cart updated Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
}
public function ViewProduct($id){
  $product=DB::table('products')
  ->join('brands','products.brand_id','brands.id')
  ->join('categories','products.category_id','categories.id')
  ->join('subcategories','products.subcategory_id','subcategories.id')
  ->select('products.*','brands.brand_name','subcategories.subcategory_name', 'categories.category_name')
  ->where('products.id',$id)->first();
  $color=$product->product_colour;
  $product_colour=explode(',', $color);
  $size=$product->product_size;
  $product_size=explode(',', $size);
  // return response()->json($product);
  return response::json(array(
    'product'=> $product,
    'size'=> $product_size,
    'color'=> $product_colour,
  ) );

}
public function insertintocart(Request $request){
  $id= $request->product_id;
  $product=DB::table('products')->where('id',$id)->first();
  $color=$request->color;
  $size=$request->size;
  $qty=$request->qty;

  $data = array(); 
  $data['id']= $product->id;
  $data['name']= $product->product_name;
  $data['qty']=$request->qty;
  $data['price']= $product->discount_price;
  $data['weight']= 1;
  $data['options']['image'] = $product->image_one;
  $data['options']['size'] = $request->size;
  $data['options']['color'] =$request->color;
  Cart::add($data);
  $notification=array(
    'messege'=>'Product added to cart Successfully',
    'alert-type'=>'success'
     );
   return Redirect()->back()->with($notification);

}
public function CheckOut (){
  if (Auth::check()) {
    $cart=  Cart::content();
    return \view('pages.checkout', compact('cart')); 
  }

  else{
    $notification=array(
      'messege'=>'At first Login Please',
      'alert-type'=>'success'
       );
     return Redirect()->route('login')->with($notification);

  }
  
}
    public function  ApplyCoupon (Request $request){
    $coupon=$request->coupon;
    $check = DB::table('coupons')->where('coupon', $coupon)->first();
    if ($check) {
      Session::put('coupon',[
        'Name'=>$check->coupon,
        'Discount'=>$check->discount,
        'Balance'=>Cart::subtotal()-$check->discount,

      ] );
      $notification=array(
        'messege'=>'Coupon Apply Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
    }
    else{
      $notification=array(
        'messege'=>'Invalid coupon',
        'alert-type'=>'error'
         );
       return Redirect()->back()->with($notification);
    }

}
public function  RemoveCoupon(){
      Session::forget('coupon');
      $notification=array(
        'messege'=>'Coupon Removed Successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
}


public function PaymentPage(){
  $paycart = Cart::content();
  return \view('pages.payment', compact('paycart'));
}


}
