@extends('admin.master')
@section('title', 'List CategoryBlog')
@section('main')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @if (session('flash'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Thông báo</span>
                    {{ session('flash') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Danh mục bài viết</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <form class="form-header" action="#">
                                <input class="au-input au-input--xl" type="text" name="key"
                                    value="{{ request()->input('key') }}" placeholder="Tìm kiếm danh mục" />
                                <button class="au-btn--submit" type="submit" value="Tìm kiếm">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>


                        </div>

                    </div>
                    
                        <div class="table-data__tool">
                            

                            <div class="table-data__tool-right">
                                <a href="{{ route('cateBlog.add') }}"
                                    class="au-btn au-btn-icon au-btn--green au-btn--small text-decoration-none">
                                    <i class="zmdi zmdi-plus"></i>Thêm danh mục</a>

                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 0; ?>
                                    @foreach ($cate as $item)
                                        <tr class="tr-shadow">
                                            <td>{{ $k+=1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            @if ($item->status == 1)
                                            <td> <span class="badge badge-success">Hiện</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Ẩn</span></td>
                                            @endif
                                            <td>{{ $item->created_at }}</td>
                                            
                                            <td>
                                                <div class="table-data-feature">

                                                    <a href="{{ route('cateBlog.edit', $item->_id) }}" class="item"
                                                        data-toggle="tooltip" data-placement="top" title="Chi tiết">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    
                                                        <a class="item" href="{{ route('cateBlog.delete', $item->_id) }}"
                                                            onclick="return confirm('Hành động này đồng nghĩa với việc sẽ xóa tất cả bài viết thuộc danh mục này')"
                                                            data-toggle="tooltip" data-placement="top" title="Xóa">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        
                    <!-- END DATA TABLE -->
                </div>
            </div>
            {{ $cate->links('admin.pages.paginate.pagination') }}
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2022 Colorlib. All rights reserved. Template by <a
                                href="https://www.facebook.com/huu.hoang.587">Hoang Hai Huu</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
