<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function category(){
        $category=Category::all();
        return view('admin/category/category', compact('category'));
      }
      public function StoreCategory(Request $request){
      $validated= $request->validate(['category_name'=>'required|unique:categories|max:255',]);
      $category = new category;
      $category->category_name=$request->category_name;
      $category->save();
      $notification=array(
        'messege'=>'Category added successfully',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);

      }
      public function DeleteCategory($id){
        $delete=Category::where('id',$id)->delete();
        $notification=array(
            'messege'=>'Category deleted successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

      }
      public function EditCategory($id){
      $category = DB::table('categories')->where('id',$id)->first();
      return view('admin/category/edit_category', compact('category'));
      }
      public function UpdateCategory(Request $request, $id){
        $validated= $request->validate(['category_name'=>'required|max:255',]);
        $data =array();
        $data['category_name']= $request->category_name;
        $update= DB::table('categories')->where('id', $id)->update($data);
        if($update){
            $notification=array(
                'messege'=>'Updated successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('categories')->with($notification);
        }
        else{
            $notification=array(
                'messege'=>'Nothing to update',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
        }
    
      }
    
}
