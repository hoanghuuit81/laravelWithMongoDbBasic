<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class blogController extends Controller
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
        $blogs = Blog::where('title_blog','LIKE',"%{$key}%")->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.pages.blog.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateBlog = Category_blog::all();

        return view('admin.pages.blog.add',compact('cateBlog'));
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
                'title_blog' => 'required|max:60',
                'author' => 'required',
                'image' => 'required',
                'content' => 'required',
                'cate_blog_id' => 'required',
                'status' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 60 ký tự',
                'lt' => ':attribute phải nhỏ hơn giá gốc',
            ],
            [
                'title_blog' => 'Tiêu đề bài viết',
                'author' => 'Tác giả',
                'image' => 'Ảnh',
                'content' => 'Nội dung',
                'cate_blog_id' => 'Danh mục bài viết',
                'status' => 'Trạng thái',
            ]
        );


        if ($req->has('image')) {
            $file = $req->image;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        }

        $req->merge(['file_name' => $file_name]);

        Blog::create([
            'title_blog' => $req->input('title_blog'),
            'author' => $req->input('author'),
            'image' => $file_name,
            'content' => $req->input('content'),
            'cate_blog_id' => $req->input('cate_blog_id'),
            'status' => $req->input('status'),
        ]);

        return redirect()->route('blog.index')->with('flash', 'Thêm mới bài viết thành công');
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

    public function ckeditorImage(Request $req){
        if($req->hasFile('upload')){
            $name = $req->file('upload')->getClientOriginalName();
            $head = pathinfo($name, PATHINFO_FILENAME);
            $last = $req->file('upload')->getClientOriginalExtension();
            $file_name = $head.'_'.time().'.'.$last;
            $req->file('upload')->move(public_path('uploads/ckeditor'),$file_name);

            $CKEditorFuncNum = $req->input('CKEditorFuncNum');

            $url = asset('uploads/ckeditor/'.$file_name);
            $mess = 'Tải ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$mess')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
            

        }
    }

    public function fileBrowser(){
        $paths = glob(public_path('uploads/ckeditor/*'));
        $file_name = array();
        foreach($paths as $path){
            array_push($file_name,basename($path));
        }

        $data = array(
            'fileNames' => $file_name
        );

        return view('admin.pages.image.file')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCate = Category_blog::all();
        $blog = Blog::find($id);
        return view('admin.pages.blog.edit',compact('blog','allCate'));
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
                'title_blog' => 'required|max:60',
                'author' => 'required',
                'content' => 'required',
                'cate_blog_id' => 'required',
                'status' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 60 ký tự',
                'lt' => ':attribute phải nhỏ hơn giá gốc',
            ],
            [
                'title_blog' => 'Tiêu đề bài viết',
                'author' => 'Tác giả',
                'content' => 'Nội dung',
                'cate_blog_id' => 'Danh mục bài viết',
                'status' => 'Trạng thái',
            ]
        );

        $blog = Blog::find($id);

        if (!$req->has('image')) {
           $file_name = $blog->image;
        }else{
            $isExists = File::exists(public_path('files/' . $blog->file));

            if ($isExists) {
                File::delete(public_path('files/' . $blog->file));
            }

            $file = $req->image;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
            $req->merge(['file_name' => $file_name]);
        }


        $blog->update([
            'title_blog' => $req->input('title_blog'),
            'author' => $req->input('author'),
            'image' => $file_name,
            'content' => $req->input('content'),
            'cate_blog_id' => $req->input('cate_blog_id'),
            'status' => $req->input('status'),
        ]);

        return redirect()->route('blog.index')->with('flash', 'Cập nhật blog thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('flash','Xóa thành công');
    }
}
