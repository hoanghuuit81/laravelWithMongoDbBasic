@extends('clien.master')
@section('title', 'BLog Detail')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-lg-3 order-lg-1 order-2">
            <!-- blog-sidebar-wrap start -->
            <div class="blog-sidebar-wrap">
                <div class="blog-sidebar-widget-area">
                    <!--single-widget start  -->
                    <div class="single-widget mb-30">
                        <h4 class="widget-title">Danh mục</h4>
                        <!-- category-widget start -->
                        <div class="category-widget-list">
                            <ul>
                                @foreach ($cateBlog as $item)
                                    <li><a href="#">{{ $item->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-widget end -->
                    </div>
                    <!--single-widget end  -->

                    <!--single-widget start  -->
                    <div class="single-widget mb-30">
                        <h4 class="widget-title">Bài viết gần đây</h4>

                        <div class="recent-post-widget">
                            @foreach ($RecentBlogs as $item)
                                <div class="single-widget-post">
                                    <div class="post-thumb">
                                        <a href="#"><img src="{{ asset('uploads') }}\{{ $item->image }}" alt=""></a>
                                    </div>
                                    <div class="post-info">
                                        <h6 class="post-title"><a href="#">{{ $item->title_blog }}</a></h6>
                                        <div class="post-date">{{ $item->created_at }}</div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>

                    </div>
                    <!--single-widget end  -->

                </div>
            </div>
            <!-- blog-sidebar-wrap end -->
        </div>
        <div class="col-lg-9 order-lg-2 order-1">

            <div class="blog-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- single-blog-wrap Start -->
                        <div class="single-blog-wrap mb-40">
                            <div class="latest-blog-content mt-0">
                                <h4><a href="{{ route('showBlog.detail',$item->_id) }}l">{{ $blog->title_blog }}</a></h4>
                                <ul class="post-meta">
                                    <li class="post-author">Bởi <a href="#">{{ $blog->author }} </a></li>
                                    <li class="post-date">{{ $blog->created_at }}</li>
                                </ul>
                            </div>
                            <div>{!! htmlspecialchars_decode($blog->content) !!}</div>

                            <div class="meta-sharing">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="social-icons text-end">
                                            <li>
                                                <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-blog-wrap End -->

                    </div>
                </div>

                <div class="related-post-blog-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h4>Bài viết liên quan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($RecentBlogs as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-blog mt-30">
                                <div class="latest-blog-image">
                                    <a href="{{ route('showBlog.detail',$item->_id) }}"><img src="{{ asset('uploads') }}\{{ $item->image }}" alt=""></a>
                                </div>
                                <div class="latest-blog-content mt-20">
                                    <h4><a href="{{ route('showBlog.detail',$item->_id) }}">{{ $item->title_blog }} </a></h4>
                                    <ul class="post-meta">
                                        <li class="post-date">{{$item->created_at}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection