<?php

namespace App\Http\Controllers;

use App\Models\Category_blog;
use Illuminate\Http\Request;

class categoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $key = ' ';
            if($req->input('key')){
                $key = $req->input('key') ;
            }
            $cate = Category_blog::where('name','LIKE',"%{$key}%")->orderBy('created_at', 'desc')->paginate(5);
            return view('admin.pages.categoryBlog.list',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categoryBlog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|unique:category_blogs|max:25',
                'status' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 25 ký tự',
                'unique' =>':attribute đã tồn tại trên hệ thống',
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái',
            ]
        );

        Category_blog::create([
            'name'=>$req->input('name'),
            'status'=>$req->input('status'),
        ]);

        return redirect()->route('cateBlog.index')->with('flash','Thêm mới danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category_blog::find($id);
        return view('admin.pages.categoryBlog.edit',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate(
            [
                'name' => 'required|max:25',
                'status' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 25 ký tự',
                'unique' =>':attribute đã tồn tại trên hệ thống',
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái',
            ]
        );
        

        Category_blog::where('_id',$id)
            ->update([
            'name'=>$req->input('name'),
            'status'=>$req->input('status'),
        ]);
        
        return redirect()->route('cateBlog.index')->with('flash','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category_blog::find($id);
        $cate->delete();
        return redirect()->route('cateBlog.index')->with('flash','Xóa thành công');
    }
}
