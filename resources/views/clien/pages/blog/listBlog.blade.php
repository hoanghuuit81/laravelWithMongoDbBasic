@extends('clien.master')
@section('title', 'BLog')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-lg-3 order-lg-1 order-2">
            <!-- blog-sidebar-wrap start -->
            <div class="blog-sidebar-wrap section-pt">
                <div class="blog-sidebar-widget-area">

                    <!--single-widget start  -->
                    <div class="single-widget mb-30">
                        <h4 class="widget-title">Danh mục</h4>
                        <!-- category-widget start -->
                        <div class="category-widget-list">
                            <ul>
                                @foreach ($cateBlog as $item)
                                    <li><a href="{{ route('showBlog.byCate',$item->_id) }}">{{ $item->name }} </a></li>
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
                                        <a href="{{ route('showBlog.detail',$item->_id) }}"><img src="{{ asset('uploads') }}\{{ $item->image }}" alt=""></a>
                                    </div>
                                    <div class="post-info">
                                        <h6 class="post-title"><a href="{{ route('showBlog.detail',$item->_id) }}">{{ $item->title_blog }}</a></h6>
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

            <div class="blog-wrapper section-pt">
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-lg-6 col-md-6">
                            <div class="singel-latest-blog">
                                <div class="articles-image">
                                    <a href="{{ route('showBlog.detail',$item->_id) }}">
                                        <img src="{{ asset('uploads') }}\{{ $item->image }}" alt="">
                                    </a>
                                </div>
                                <div class="aritcles-content">
                                    <div class="author-name">
                                        Người viết: <a href="#"> {{ $item->author }}</a> - {{ $item->created_at }}
                                    </div>
                                    <h4><a href="{{ route('showBlog.detail',$item->_id) }}" class="articles-name">{{ $item->title_blog }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    


                </div>

                <!-- paginatoin-area start -->
                {{$blogs->links('clien.pages.paginate.pagination')}}
                <!-- paginatoin-area end -->
            </div>

        </div>
    </div>
</div>

@endsection