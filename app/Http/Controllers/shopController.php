<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index(Request $req){
        $key = ' ';
        
        $cate = category::all();
        
        if( isset($_GET['sort_by']) ){
            $sort = $_GET['sort_by'];
            if($sort == 'nameAz'){
                
                $pro = product::where('status','1')->orderBy('name','DESC')->paginate(9);
                return view('clien.pages.shop',compact('pro','cate'));
            }
            if($sort=='nameZa'){
                
                $pro = product::where('status','1')->orderBy('name','ASC')->paginate(9);
                return view('clien.pages.shop',compact('pro','cate'));
            }
            if($sort =='priceAz'){
                
                $pro = product::where('status','1')->orderBy('sale_price','ASC')->paginate(9);
                return view('clien.pages.shop',compact('pro','cate'));
            }
            if($sort =='priceZa'){
                
                $pro = product::where('status','1')->orderBy('sale_price','DESC')->paginate(9);
                return view('clien.pages.shop',compact('pro','cate'));
            }
            
        }else{
            if ($req->input('key')) {
                $key = $req->input('key');
            }
            $pro = product::where('name','LIKE',"%{$key}%")->where('status','1')->orderBy('created_at','desc')->paginate(9);          
            return view('clien.pages.shop',compact('pro','cate'));
        }
        
        
    }

    public function proByCate($id){
        $pro = product::where('category_id',$id)->where('status','1')->orderBy('created_at','desc')->paginate(9);
        $cate = category::all();
        return view('clien.pages.shop',compact('pro','cate'));
    }


    public function detailproduct($id){
        $pro = product::find($id);
        $allPro = product::all();
        return view('clien.pages.detail',compact('pro','allPro'));
    }

   
}
