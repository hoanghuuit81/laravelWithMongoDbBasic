<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category_blog;
use Illuminate\Http\Request;

class showBlogController extends Controller
{
    public function index(){
        $cateBlog = Category_blog::all();
        $blogs = Blog::where('status','1')->orderBy('created_at','desc')->paginate(6);
        $RecentBlogs = Blog::where('status','1')->orderBy('created_at','desc')->limit(3)->get();
        return view('clien.pages.blog.listBlog',compact('cateBlog','blogs','RecentBlogs'));
    }

    public function blogDetail($id){
        $blog = Blog::find($id);
        $cateBlog = Category_blog::all();
        $RecentBlogs = Blog::where('status','1')->orderBy('created_at','desc')->limit(3)->get();
        return view('clien.pages.blog.detailBlog',compact('cateBlog','blog','RecentBlogs'));

    }

    public function blogByCate($id){
        $blogs = Blog::where('cate_blog_id',$id)->where('status','1')->orderBy('created_at','desc')->paginate(6);
        $cateBlog = Category_blog::all();
        $RecentBlogs = Blog::where('status','1')->orderBy('created_at','desc')->limit(3)->get();
        return view('clien.pages.blog.listBlog',compact('cateBlog','blogs','RecentBlogs'));
    }
}
