<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function ProductDetail($id,$product_name){
        $product= DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('subcategories','products.category_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','subcategories.subcategory_name')
        ->where('products.id', $id)
        ->first();
        $color=$product->product_colour;
        $product_colour=explode(',', $color);
        $size=$product->product_size;
        $product_size=explode(',', $size);
        return \view('pages.product_details', compact('product','product_colour','product_size'));

    }
    public function AddCart(Request $request , $id){
        $product=DB::table('products')->where('id',$id)->first();

        $data = array(); 
        $data['id']= $product->id;
        $data['name']= $product->product_name;
        $data['qty']= $request->qty;
        $data['price']= $product->discount_price;
        $data['weight']= 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['size'] = $request->size;
        $data['options']['color'] = $request->color;
        Cart::add($data);
        $notification=array(
            'messege'=>'Product Added to Cart successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function SubProduct($id){
        $product= DB::table('products')->where('subcategory_id', $id)->paginate(10);
        $category= DB::table('categories')->get();
        $brand= DB::table('products')->where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        $subcategory= DB::table('products')->where('subcategory_id', $id)->select('subcategory_id')->groupBy('subcategory_id')->get();
        return \view ('pages.sub_product',compact('product', 'category','brand','subcategory'));
    }
    public function CatProduct($id){
        $product= DB::table('products')->where('category_id', $id)->paginate(10);
        $category= DB::table('categories')->get();
        $brand= DB::table('products')->where('category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
    //  $category= DB::table('products')->where('category_id', $id)->select('category_id')->groupBy('category_id')->get();
        return \view ('pages.sub_product',compact('product', 'category','brand'));
  
    }
    public function  SearchProduct(Request $request){
        $item = $request->search;
        // echo "$item";
        $product = DB::table('products')
        ->where('product_name', "Like", "%$item%")
        ->paginate(20);
        return view('pages.search', compact('product'));
    }
}
