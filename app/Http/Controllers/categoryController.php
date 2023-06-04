<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
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
            $key = $req->input('key');
        }
        $cate = category::where('name','like',"%{$key}%")->orderBy('created_at', 'desc')->paginate(2);
        return view('admin.pages.category.list',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add');
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
                'name' => 'required|unique:categories|max:25',
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 25 ký tự',
                'unique' =>':attribute đã tồn tại trên hệ thống',
            ],
            [
                'name' => 'Tên danh mục',
            ]
        );

        category::create([
            'name'=>$req->input('name'),
            'status'=>$req->input('status'),
        ]);

        return redirect()->route('category.index')->with('flash','Thêm mới danh mục thành công');
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
        $cate = category::find($id);
        
        return view('admin.pages.category.edit',compact('cate'));
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
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 25 ký tự',
                
            ],
            [
                'name' => 'Tên danh mục',
            ]
        );
        

        category::where('_id',$id)
            ->update([
            'name'=>$req->input('name'),
            'status'=>$req->input('status'),
        ]);
        
        return redirect()->route('category.index')->with('flash','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = category::find($id);
        $cate->delete();
        return redirect()->route('category.index')->with('flash','Xóa thành công');
    }
}
