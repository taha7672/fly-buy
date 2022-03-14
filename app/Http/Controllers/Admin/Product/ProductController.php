<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $product = DB::table('products')
        ->join('categories','products.category_id','categories.id' )
        ->join('brands','products.brand_id', 'brands.id')
        ->select('products.*', 'categories.category_name','brands.brand_name')
        ->get();
        // return response()->json($product);
        return view('admin/product/index' ,compact('product'));

    }
    public function Create(Request $request){
        $category= DB::table('categories')->get();
        $brand= DB::table('brands')->get();
        $subcat =DB::table('subcategories')->get();

        return view('admin/product/create' , compact('category', 'brand', 'subcat'));

    }

    public function GetSubCat($category_id){

        $cat = DB::table('subcategories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    }
   public function StoreProduct(Request $request){
        $data = array();
       $data['product_name']= $request->product_name;
       $data['product_code']= $request->product_code;
       $data['selling_price']= $request->selling_price ;
       $data['category_id']= $request-> category_id;
       $data['subcategory_id']= $request-> subcategory_id;
       $data['brand_id']= $request-> brand_id;
       $data['product_size']= $request-> product_size;
       $data['product_colour']= $request-> product_colour;
       $data['discount_price']= $request-> discount_price;
       $data['product_quantity']= $request-> product_quantity;
       $data['product_detail']= $request-> product_detail;
       $data['video_link']= $request->video_link;
       $data['main_slider']= $request->main_slider;
       $data['hot_deal']= $request->hot_deal;
       $data['mid_slider']= $request->mid_slider;
       $data['best_rated']= $request->best_rated;
       $data['trend']= $request->trend;
       $data['hot_new']= $request->hot_new;
       $data['status']=1;
       $image_one=$request->image_one;
       $image_two=$request->image_two;
       $image_three=$request->image_three;
    //    return response()->json($data);
    if ($image_one && $image_two && $image_three) {
        $image_one_name= hexdec(uniqid()).'.'. $image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(300,300)->save('public/media/product/'. $image_one_name);
        $data['image_one']='public/media/product/'. $image_one_name;
        $image_two_name= hexdec(uniqid()).'.'. $image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(300,300)->save('public/media/product/'. $image_two_name);
        $data['image_two']='public/media/product/'. $image_two_name;
        $image_three_name= hexdec(uniqid()).'.'. $image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(300,300)->save('public/media/product/'. $image_three_name);
        $data['image_three']='public/media/product/'. $image_three_name;
        $product= DB::table('products')->insert($data);
        $notification=array(
            'messege'=>'Product inserted successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
       
   }
   public function InactiveProduct($id){
       DB::table('products')->where('id', $id)->update(['status'=> 0]);
       $notification=array(
        'messege'=>'Product inactiveted successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);

   }
   public function ActiveProduct($id){
       DB::table('products')->where('id', $id)->update(['status'=> 1]);
       $notification=array(
        'messege'=>'Product activeted successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);

   }
   public function DeleteProduct($id){
       $product = DB::table('products')->where('id', $id)->first();
       $image1 =$product->image_one;
       $image2 =$product->image_two;
       $image3 =$product->image_three;
       unlink($image1);
       unlink($image2);
       unlink($image3);
       DB::table('products')->where('id', $id)->delete();
       $notification=array(
        'messege'=>'Product Deleted successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
   }
   public function ShowProduct($id){
    $product = DB::table('products')
    ->join('categories','products.category_id','categories.id' )
    ->join('subcategories','products.subcategory_id','subcategories.id' )
    ->join('brands','products.brand_id', 'brands.id')
    ->select('products.*', 'categories.category_name','brands.brand_name', 'subcategories.subcategory_name')
    ->first();
    // return response()->json($product);
    return view('admin/product/show' ,compact('product'));

}
public function EditProduct($id){
    $product= DB::table('products')->where('id', $id)->first();
    return \view('admin/product/edit', compact('product'));
}
  public function UpdateProductWithoutimg(Request $request , $id){

    $data = array();
    $data['product_name']= $request->product_name;
    $data['product_code']= $request->product_code;
    $data['selling_price']= $request->selling_price ;
    $data['category_id']= $request-> category_id;
    $data['subcategory_id']= $request-> subcategory_id;
    $data['brand_id']= $request-> brand_id;
    $data['product_size']= $request-> product_size;
    $data['product_colour']= $request-> product_colour;
    $data['discount_price']= $request-> discount_price;
    $data['product_quantity']= $request-> product_quantity;
    $data['product_detail']= $request-> product_detail;
    $data['video_link']= $request->video_link;
    $data['main_slider']= $request->main_slider;
    $data['hot_deal']= $request->hot_deal;
    $data['mid_slider']= $request->mid_slider;
    $data['best_rated']= $request->best_rated;
    $data['trend']= $request->trend;
    $data['hot_new']= $request->hot_new;
    $update= DB::table('products')->where('id', $id)->update($data);
    if ($update) {
        $notification=array(
            'messege'=>'Product Updated successfully',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.product')->with($notification);
    }
    else{
        $notification=array(
            'messege'=>'Nothing to Updated ',
            'alert-type'=>'error'
             );
           return Redirect()->route('all.product')->with($notification);

    }
   
  }
        public function UpdateProductimg(Request $request , $id){

            $oldone= $request->old_one;
            $oldtwo= $request->old_two;
            $oldthree= $request->old_three;
            $data = array();
            $image_one=$request->file('image_one');
            $image_two=$request->file('image_two');
            $image_three=$request->file('image_three');
            if ($image_one) {
            unlink($oldone);
            $image_full_name=hexdec(uniqid()).'.'. $image_one->getClientOriginalExtension();            
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image_one->move($upload_path,$image_full_name);
            $data['image_one']=$image_url;
            $update= DB::table('products')->where('id', $id)->update($data);
            if($update){
                $notification=array(
                    'messege'=>'Photo one Updated successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);
                    }
                                

  }
  
            if ($image_two) {
            unlink($oldtwo);
            $image_full_name=hexdec(uniqid()).'.'. $image_two->getClientOriginalExtension();            
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image_two->move($upload_path,$image_full_name);
            $data['image_two']=$image_url;
            $update= DB::table('products')->where('id', $id)->update($data);
            if($update){
                $notification=array(
                    'messege'=>'Photo two Updated successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);
                    }
                              

  }
  
            if ($image_three) {
            unlink($oldthree);
            $image_full_name=hexdec(uniqid()).'.'. $image_three->getClientOriginalExtension();            
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image_three->move($upload_path,$image_full_name);
            $data['image_three']=$image_url;
            $update= DB::table('products')->where('id', $id)->update($data);
            if($update){
                $notification=array(
                    'messege'=>'Photo three Updated successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);
                }               

  }
  
        
}


}
