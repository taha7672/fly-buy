<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserRoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function UserRole(){
        $role = DB::table('admins')->where('type', 2)->get();
        return view('admin.role.all_role', compact('role'));
    }
    public function NewUserRole(){
    

        return view('admin.role.create_role');
    }
    public function AddUser(Request $request)
    {
        $newuser= array ();
        $newuser['name'] = $request->name;
        $newuser['phone'] = $request->phone;
        $newuser['email'] = $request->email;
        $newuser['password'] = hash::make($request->password) ;
        $newuser['coupon'] = $request->coupon;
        $newuser['porder'] = $request->porder;
        $newuser['product'] = $request->product;
        $newuser['category'] = $request->category;
        $newuser['stock'] = $request->stock;
        $newuser['blog'] = $request->blog;
        $newuser['other'] = $request->other;
        $newuser['oreturn'] = $request->oreturn;
        $newuser['message'] = $request->message;
        $newuser['type']= 2;
        DB::table('admins')->insert($newuser);
        $notification=array(
            'messege'=>'Child User Inserted Successfully',
            'alert-type'=>'success'
             );
             return Redirect()->back()->with($notification);

            }


            public function DeleteUser($id )
            {
                DB::table('admins')->where('id', $id)->delete();
                $notification=array(
                    'messege'=>'Child User Deleted Successfully',
                    'alert-type'=>'success'
                     );
                     return Redirect()->back()->with($notification);

            }
            public function EditUser($id){
             $user=   DB::table('admins')->where('id', $id)->first();
                return view('admin.role.edit_user', compact('user'));

            }
            public function UpdateUser(Request $request){
                $id = $request->id;
                $newuser= array ();
        $newuser['name'] = $request->name;
        $newuser['phone'] = $request->phone;
        $newuser['email'] = $request->email;
        $newuser['coupon'] = $request->coupon;
        $newuser['porder'] = $request->porder;
        $newuser['product'] = $request->product;
        $newuser['category'] = $request->category;
        $newuser['stock'] = $request->stock;
        $newuser['blog'] = $request->blog;
        $newuser['other'] = $request->other;
        $newuser['oreturn'] = $request->oreturn;
        $newuser['message'] = $request->message;
        DB::table('admins')->where('id', $id)->update($newuser);
        $notification=array(
            'messege'=>'Child User Updated Successfully',
            'alert-type'=>'success'
             );
             return Redirect()->route('user.role')->with($notification);


            }

            // Stock
            public function Stock(){
                $product = DB::table('products')
                ->join('categories','products.category_id','categories.id' )
                ->join('brands','products.brand_id', 'brands.id')
                ->select('products.*', 'categories.category_name','brands.brand_name')
                ->get();
                // return response()->json($product);
                return view('admin.stock.stock' ,compact('product'));
        
        
    }
}

