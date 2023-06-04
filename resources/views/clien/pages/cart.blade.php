@extends('clien.master')
@section('title', 'Cart')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('cart.update') }}" method="POST" class="cart-table">
                @csrf
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="plantmore-product-thumbnail">Ảnh</th>
                                <th class="cart-product-name">Tên</th>
                                <th class="plantmore-product-price">Giá sản phẩm</th>
                                <th class="plantmore-product-quantity">Số lượng</th>
                                <th class="plantmore-product-subtotal">Thành tiền</th>
                                <th class="plantmore-product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td class="plantmore-product-thumbnail"><a href="{{ route('shop.detail',$item->id) }}"><img  style="width:80px" src="{{ asset('uploads') }}\{{ $item->options->image }}" alt=""></a></td>
                                <td class="plantmore-product-name"><a href="{{ route('shop.detail',$item->id) }}">{{ $item->name }}</a></td>
                                <td class="plantmore-product-price"><span class="amount">{{ number_format($item->price) }}đ</span></td>
                                <td class="plantmore-product-quantity">
                                    <input min="1" name="qty[{{$item->rowId}}]"  value="{{$item->qty}}" type="number">
                                </td>
                                <td class="product-subtotal"><span class="amount">{{ number_format($item->price * $item->qty) }}</span></td>
                                <td class="plantmore-product-remove"><a href="{{ route('cart.delete',$item->rowId) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="coupon-all">

                            <div class="coupon2">
                                <input class="submit" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                                <a href="{{ route('shop.index') }}" class=" continue-btn">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 ml-auto">
                        <div class="cart-page-total">
                            <h2>Tổng đơn hàng</h2>
                            <ul>
                                <li>Tổng cộng <span>{{ Cart::subtotal() }}đ</span></li>
                            </ul>
                            <a href="#" class="proceed-checkout-btn">Hoàn tất đặt hàng</a>
                            
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
        </div>
    </div>
</div>
@endsection