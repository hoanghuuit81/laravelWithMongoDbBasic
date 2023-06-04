<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{

    public function index(){
        return view('clien.pages.cart');
    }
    public function add(Request $req, $id)
    {
        $pro = product::find($id);
        if($req->has('quantity')){
            $qty = $req->quantity;
        }else{
            $qty = 1;
        }
        
        Cart::add([
            'id' => $pro->_id,
            'name' => $pro->name,
            'qty' => $qty,
            'price' => $pro->sale_price,
            'options' => ['image' => $pro->image]
        ]);

        return redirect()->back()->with('flash','Thêm vào giỏ hàng thành công');
    }

    public function update(Request $req){
        $data = $req->input('qty');
        foreach($data as $k=>$v){
            Cart::update($k,$v);
        }
        return redirect()->back()->with('flash','Cập nhật giỏ hàng thành công');
    }

    public function delete($id){
        
        Cart::remove($id);

        return redirect()->back()->with('flash','Xóa thành công');;
    }
}
