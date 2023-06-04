@extends('clien.master')
@section('title', 'Detail')
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
    <div class="row product-details-inner">
        <div class="col-lg-5 col-md-6">
            <!-- Product Details Left -->
            <div class="product-large-slider">
                <div class="pro-large-img img-zoom">
                    <img src="{{ asset('uploads') }}\{{ $pro->image }}" alt="product-details" />
                </div>
            </div>
            <!--// Product Details Left -->
        </div>

        <div class="col-lg-7 col-md-6">
            <div class="product-details-view-content">
                <div class="product-info">
                    <h3>{{ $pro->name }}</h3>
                    
                    <div class="price-box">
                        <span class="new-price">{{ number_format($pro->sale_price) }}đ</span>
                        <span class="old-price">{{ number_format($pro->price) }}đ</span>
                    </div>
                    <br>
                    <div>{!! htmlspecialchars_decode($pro->description) !!}</div>
                    <br>
                    <div class="single-add-to-cart">
                        <form action="{{route('cart.add',$pro->_id)}}" class="cart-quantity d-flex">
                            @csrf
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input type="number" class="input-text" name="quantity" value="1" title="Qty">
                                </div>
                            </div>
                            <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    <br>
                    <ul class="stock-cont">
                        
                        <li class="product-stock-status">Danh mục: <a href="#">{{ $pro->category->name }}</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="product-description-area section-pt">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-details-tab">
                    <ul role="tablist" class="nav">
                        <li class="active" role="presentation">
                            <a data-bs-toggle="tab" role="tab" href="#description" class="active">Description</a>
                        </li>
                        <li role="presentation">
                            <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product_details_tab_content tab-content">
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                        <div class="product_description_wrap  mt-30">
                            <div class="product_desc mb-30">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>

                                <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                            </div>

                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                        <div class="review_address_inner mt-30">
                            <!-- Start Single Review -->
                            <div class="pro_review">
                                <div class="review_thumb">
                                    <img alt="review images" src="assets/images/other/reviewer-60x60.jpg">
                                </div>
                                <div class="review_details">
                                    <div class="review_info mb-10">
                                        <ul class="product-rating d-flex mb-10">
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                        </ul>
                                        <h5>Admin - <span> November 19, 2019</span></h5>

                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                        </div>
                        <!-- Start RAting Area -->
                        <div class="rating_wrap mt-50">
                            <h5 class="rating-title-1">Add a review </h5>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <h6 class="rating-title-2">Your Rating</h6>
                            <div class="rating_list">
                                <div class="review_info mb-10">
                                    <ul class="product-rating d-flex mb-10">
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End RAting Area -->
                        <div class="comments-area comments-reply-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="#" class="comment-form-area">
                                        <div class="row comment-input">
                                            <div class="col-md-6 comment-form-author mt-15">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" required="required" name="Name">
                                            </div>
                                            <div class="col-md-6 comment-form-email mt-15">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" required="required" name="email">
                                            </div>
                                        </div>
                                        <div class="comment-form-comment mt-15">
                                            <label>Comment</label>
                                            <textarea class="comment-notes" required="required"></textarea>
                                        </div>
                                        <div class="comment-form-submit mt-15">
                                            <input type="submit" value="Submit" class="comment-submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div> --}}

    <div class="related-product-area section-pt">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3> Sản phẩm liên quan</h3>
                </div>
            </div>
        </div>
        <div class="row product-active-lg-4">
            @foreach ($allPro as $item)
            <div class="col-lg-12">
                <!-- single-product-area start -->
                <div class="single-product-area mt-30">
                    <div class="product-thumb">
                        <a href="product-details.html">
                            <img class="primary-image" src="{{ asset('uploads') }}\{{ $item->image }}" alt="">
                        </a>
                        <div class="action-links">
                            <a href="#" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                        </div>
                    </div>
                    <div class="product-caption">
                        <h4 class="product-name"><a href="{{ route('shop.detail',$item->_id) }}">{{ $item->name }}</a></h4>
                        <div class="price-box">
                            <span class="new-price">{{ number_format($item->sale_price) }}</span>
                            <span class="old-price">{{ number_format($item->price) }}</span>
                        </div>
                    </div>
                </div>
                <!-- single-product-area end -->
            </div>
            @endforeach
            
        </div>
    </div>

</div>
@endsection