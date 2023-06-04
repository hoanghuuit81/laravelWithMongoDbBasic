<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $key = ' ';
        if ($req->input('key')) {
            $key = $req->input('key');
        }
        $pro = product::where('name', 'LIKE', "%{$key}%")->orderBy('created_at', 'desc')->paginate(5);


        return view('admin.pages.product.list', compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = category::all();
        return view('admin.pages.product.add', compact('cate'));
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
                'name' => 'required|max:50',
                'price' => 'required',
                'sale_price' => 'lt:price',
                'image' => 'required',
                'status' => 'required',
                'category_id' => 'required',
                'description' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 50 ký tự',
                'lt' => ':attribute phải nhỏ hơn giá gốc',
            ],
            [
                'name' => 'Tên nhân viên',
                'price' => 'Giá gốc',
                'sale_price' => 'Giá khuyến mãi',
                'image' => 'Ảnh sản phẩm',
                'status' => 'Trạng thái',
                'category_id' => 'Danh mục',
                'description' => 'Mô tả',
            ]
        );

        if ($req->has('image')) {
            $file = $req->image;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        }

        $req->merge(['file_name' => $file_name]);

        product::create([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'sale_price' => $req->input('sale_price'),
            'image' => $file_name,
            'status' => $req->input('status'),
            'category_id' => $req->input('category_id'),
            'description' => $req->input('description')
        ]);

        return redirect()->route('product.index')->with('flash', 'Thêm mới sản phẩm thành công');
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
        $pro = product::find($id);
        $cate = category::all();
        return view('admin.pages.product.edit',compact('pro','cate'));
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
                'name' => 'required|max:50',
                'price' => 'required',
                'sale_price' => 'lt:price',
                'status' => 'required',
                'category_id' => 'required',
                'description' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được dài quá 50 ký tự',
                'lt' => ':attribute phải nhỏ hơn giá gốc',
            ],
            [
                'name' => 'Tên nhân viên',
                'price' => 'Giá gốc',
                'sale_price' => 'Giá khuyến mãi',
                'status' => 'Trạng thái',
                'category_id' => 'Danh mục',
                'description' => 'Mô tả',
            ]
        );

        $proUpdate = product::find($id);

        if (!$req->has('avartar')) {
            $file_name = $proUpdate->image;
        }else{       
             $isExists = File::exists(public_path('files/' . $proUpdate->file));
             if ($isExists) {
                 File::delete(public_path('files/' . $proUpdate->file));
             }
 
             $file = $req->image;
             $file_name = $file->getClientOriginalName();
             $file->move(public_path('uploads'), $file_name);
             $req->merge(['file_name' => $file_name]);
        }


        product::where('_id',$id)->update([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'sale_price' => $req->input('sale_price'),
            'image' => $file_name,
            'status' => $req->input('status'),
            'category_id' => $req->input('category_id'),
            'description' => $req->input('description')
        ]);

        return redirect()->route('product.index')->with('flash', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = product::find($id);
        $pro->delete();
        return redirect()->route('product.index')->with('flash', 'Xóa sản phẩm thành công');
    }
}
