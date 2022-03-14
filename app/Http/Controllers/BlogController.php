<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use response;
use Session;

class BlogController extends Controller
{
    //
    public function postsBlog(){
        $postBlog = DB::table('posts')
        ->join('post_category', 'posts.category_id','post_category.id') 
        ->select('posts.*', 'post_category.category_name_en', 'post_category.category_name_ur')
        ->get();
        // return response()->json($postBlog);
        return \view('pages.blog', compact('postBlog'));
    
      }
      public function English(){
          Session::get('lang');
          Session()->forget('lang');
          Session::put('lang','english');
          return redirect()->back();

      }
      public function Urdu(){
          Session::get('lang');
          Session()->forget('lang');
          Session::put('lang','urdu');
          return redirect()->back();

      }
      public function BlogSingle($id){
          $Bsingle = DB::table('posts')->where('id', $id)->get();
          return \view('pages.blog_single', compact('Bsingle'));

      }
}
