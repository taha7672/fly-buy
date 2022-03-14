<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function PostCat(){
        $blogcat = DB::table('post_category')->get();
        
     return \view('admin/post/postcat', compact('blogcat'));
    }
    public function PostList(){
      $postlist= DB::table('posts')
      ->join('post_category', 'posts.category_id', 'post_category.id')
        ->select('posts.*','post_category.category_name_en')
        ->get();
     return \view('admin/post/postlist', compact('postlist'));
    }
    public function EditPostList($id){
      $postlist= DB::table('posts')->where('id', $id)->first();

      return \view('admin/post/edit_postlist', compact('postlist'));
    }
    public function BlogPost(){
      $blogpost = DB::table('post_category')->get();
     return \view('admin/post/addpost' , compact('blogpost'));
    }
    public function AddPost(Request $request){
      // $validated= $request->validate(['post_title_en'=>'required','c'=>'required',
      // 'detail_en'=>'required', 'detail_ur'=>'required' ,'post_image'=>'required' ]);
      $data = array();
      $data['category_id']= $request->category_id;
      $data['post_title_en']= $request->post_title_en;
      $data['post_title_ur']= $request->post_title_ur;
      $data['details_en']= $request->details_en;
      $data['details_ur']= $request->details_ur;
      $post_image=$request->file('post_image');
   if ($post_image) {
  
        $post_image_name= hexdec(uniqid()).'.'. $post_image->getClientOriginalExtension();
        Image::make($post_image)->resize(300,400)->save('public/media/blog/'. $post_image_name);
        $data['post_image']='public/media/blog/'. $post_image_name;
        DB::table('posts')->insert($data);
        $notification=array(
            'messege'=>'Post inserted successfully',
            'alert-type'=>'success'
             );
             return Redirect()->back()->with($notification);
            }
            


    }
    public function StorePostCategory(Request $request ){
        $validated= $request->validate(['category_name_en'=>'required|max:255',]);
        $validated= $request->validate(['category_name_ur'=>'required|max:255',]);
        $data=  array();
        $data['category_name_en']= $request->category_name_en;
        $data['category_name_ur']= $request->category_name_ur;
        $update= DB::table('post_category')->insert($data);
        $notification=array(
            'messege'=>'Post Category added successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    
          }
          public function DeletePostCategory($id){
            DB::table('post_category')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Post Category deleted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
          }
          public function EditPostCategory($id){
            $postcat = DB::table('post_category')->where('id',$id)->first();
            return view('admin/post/edit_postcat', compact('postcat'));
          }
          public function UpdatePostCategory(Request $request ,$id){
            $validated= $request->validate(['category_name_en'=>'required|max:255',]);
            $validated= $request->validate(['category_name_ur'=>'required|max:255',]);
            $data=  array();
            $data['category_name_en']= $request->category_name_en;
            $data['category_name_ur']= $request->category_name_ur;
            $update= DB::table('post_category')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Post Category Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('blog.category')->with($notification);
          }
          public function DeletePostBlog($id){
            $posts = DB::table('posts')->where('id', $id)->first();
            $postimg =$posts->post_image;
            unlink($postimg);
            DB::table('posts')->where('id', $id)->delete();
            $notification=array(
             'messege'=>'Post Deleted successfully',
             'alert-type'=>'success'
              );
            return Redirect()->back()->with($notification);
          }
          public function UpdateBlogPost(Request $request ,$id){
            $oldone= $request->old_image;
            $data = array();
            $data['category_id']= $request->category_id;
            $data['post_title_en']= $request->post_title_en;
            $data['post_title_ur']= $request->post_title_ur;
            $data['details_en']= $request->details_en;
            $data['details_ur']= $request->details_ur;
            $post_image=$request->file('post_image');
            if ($post_image) {
              unlink($oldone);
              $image_full_name=hexdec(uniqid()).'.'. $post_image->getClientOriginalExtension();            
              $upload_path='public/media/blog/';
              $image_url=$upload_path.$image_full_name;
              $success=$post_image->move($upload_path,$image_full_name);
              $data['post_image']=$image_url;
              $update= DB::table('posts')->where('id', $id)->update($data);
                  $notification=array(
                      'messege'=>'Post Updated successfully',
                      'alert-type'=>'success'
                      );
                  return Redirect()->route('post.list')->with($notification);
    }
    
  }




}

