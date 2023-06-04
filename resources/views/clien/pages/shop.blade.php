@extends('clien.master')
@section('title', 'Shop')
@section('main')
    <div class="container">
        @if (session('flash'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thông báo!</strong> {{ session('flash') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                {{-- <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Thông báo</span>
                    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
            @endif
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- shop-sidebar-wrap start -->
                <div class="shop-sidebar-wrap">
                    <div class="shop-box-area">

                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box shop-sidebar mb-30">
                            <h4 class="title">Product categories</h4>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                @foreach ($cate as $item)
                                <ul>
                                    <a href="{{ route('shop.proByCate',$item->_id) }}">{{$item->name}} ({{$item->products->count()}})</a></a>
                                </ul>
                                   <br>
                                @endforeach
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                        <!--sidebar-categores-box end  -->


                    </div>
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">

                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row align-itmes-center">
                        <div class="col">
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <!-- product-view-mode start -->

                                <div class="product-mode">
                                    <!--shop-item-filter-list-->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active"><a class="active grid-view" data-bs-toggle="tab"
                                                href="#grid"><i class="fa fa-th"></i></a></li>
                                        <li><a class="list-view" data-bs-toggle="tab" href="#list"><i
                                                    class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <form>
                                    @csrf
                                    <div class="product-short">
                                        <p>Sắp xếp theo :</p>
                                        <select class="nice-select" id="sort" name="sort">
                                            <option value="{{Request::url()}}?sort_by=none" >Mời chọn</option>
                                            <option value="{{Request::url()}}?sort_by=nameAz">Tên(A - Z)</option>
                                            <option value="{{Request::url()}}?sort_by=nameZa">Tên(Z - A)</option>
                                            <option value="{{Request::url()}}?sort_by=priceAz">Giá(Low > High)</option>
                                            <option value="{{Request::url()}}?sort_by=priceZa">Giá(High > Low)</option>
                                        </select>
                                    </div>
                                    
                                </form>
                                
                                <!-- product-short end -->
                            </div>
                            <!-- shop-top-bar end -->
                        </div>
                    </div>

                    <!-- shop-products-wrap start -->
                    <div class="shop-products-wrap">
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid">
                                
                                <div class="shop-product-wrap">
                                    <div class="row">
                                        @foreach ($pro as $item)
                                        <div class="col-lg-4 col-md-6">
                                            <!-- single-product-area start -->
                                           
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.detail',$item->_id) }}">
                                                        <img class="primary-image"
                                                            src="{{ asset('uploads') }}\{{ $item->image }}"
                                                            alt="">
                                                    </a>
                                                    {{-- <div class="label-product label_new">{{ $item->image }}</div> --}}
                                                    <div class="action-links">
                                                        <a href="{{route('cart.add',$item->_id)}}" class="cart-btn" title="Thêm vào giỏ hàng"><i
                                                                class="icon-basket-loaded"></i></a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="{{ route('shop.detail',$item->_id) }}">{{ $item->name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($item->sale_price) }}đ</span>
                                                        <span class="old-price">{{ number_format($item->price) }}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <!-- single-product-area end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                               
                            </div>
                            <div class="tab-pane" id="list">
                                <div class="shop-product-list-wrap">
                                    @foreach ($pro as $item)
                                    <div class="row product-layout-list mt-30">
                                        <div class="col-lg-3 col-md-3">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a href="{{ route('shop.detail',$item->_id) }}"><img src="{{ asset('uploads') }}\{{ $item->image }}" alt="Produce Images"></a>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="product-content-list text-left">
                                               
                                                <h4><a href="{{ route('shop.detail',$item->_id) }}" class="product-name">{{ $item->name }}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{ number_format( $item->sale_price ) }}đ</span>
                                                    <span class="old-price">{{ number_format( $item->price ) }}đ</span>
                                                </div>

                                                {{-- <div class="product-rating">
                                                    <ul class="d-flex">
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div> --}}
                                                <div>{!! htmlspecialchars_decode($item->description) !!}</div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="block2">
                                                <ul class="stock-cont">
                                                    <li class="product-stock-status">Danh mục: <span class="in-stock">{{ $item->category->name }}</span></li>
                                                </ul>
                                                <div class="product-button">
                                                   
                                                    <div class="add-to-cart">
                                                        <div class="product-button-action">
                                                            <a href="#" class="add-to-cart">Thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrap end -->

                    <!-- paginatoin-area start -->

                    {{$pro->links('clien.pages.paginate.pagination')}}
                    
                    <!-- paginatoin-area end -->
                </div>
                <!-- shop-product-wrapper end -->
            </div>
        </div>
    </div>
@endsection
