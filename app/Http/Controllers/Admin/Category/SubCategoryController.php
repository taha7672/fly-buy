<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\SubCategory;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;

class SubCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function SubCategory(){
        $category=DB::table('categories')->get();
        $subcat=DB::table('subcategories')
       ->join('categories', 'subcategories.category_id','categories.id')
       ->select('subcategories.*','categories.category_name')
       ->get();
        return view('admin/category/sub_category', compact('subcat','category'));
      }
      public function StoreSubCategory(Request $request){
        $validated= $request->validate(['subcategory_name'=>'required',
      'category_id'=>'required'
    ]);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'messege'=>'Sub Category added successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    
          }
          public function DeleteSubCategory($id){
            DB::table('subcategories')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Sub Category deleted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    
          }
          public function EditSubCategory($id){
            $subcat = DB::table('subcategories')->where('id',$id)->first();
            $category = DB::table('categories')->get();
            return view('admin/category/edit_subcategory', compact('subcat','category'));
            }
            public function UpdateSubCategory(Request $request, $id){
                $validated= $request->validate(['subcategory_name'=>'required',
               'category_id'=>'required'
            ]);
                $data =array();
                $data['subcategory_name']= $request->subcategory_name;
                $data['category_id']= $request->category_id;
                $update= DB::table('subcategories')->where('id', $id)->update($data);
                    $notification=array(
                        'messege'=>'Updated successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('sub.category')->with($notification);
              }
      }

