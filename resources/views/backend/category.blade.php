@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('main');
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm danh mục
                    </div>
                    <div class="panel-body">
                        @include('error.note')
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                    </div>
                    <div class="panel-footer ">
                        <input type="submit" value="Thêm mới" name="submit" class="form-control btn btn-primary"
                            placeholder="Tên danh mục...">
                    </div>
                    @csrf
                    </form>


                </div>

            </div>
            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Tên danh mục</th>
                                        <th style="width:30%">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catelist as $cate)
                                        <tr>
                                            <td>{{ $cate->cate_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', ['id' => $cate->id]) }}"
                                                    class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span> Sửa
                                                </a>
                                                <a href="{{ route('admin.category.delete', ['id' => $cate->id]) }}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div> <!--/.main-->
@stop
