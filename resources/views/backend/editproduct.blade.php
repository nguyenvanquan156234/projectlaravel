@extends('backend.master')
@section('title','Sửa sản phẩm')
@section('main');

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Sửa sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" class="form-control" value="{{$product->prod_name}}">
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="{{$product->prod_price}}">
								</div>
								<div class="form-group">
                                    <label for="menu">Ảnh Sản Phẩm</label>
                                    <input type="file" class="form-control" id="img" name="img" onchange="previewImage(this)" >
									<img id="img-preview" class="thumbnail " width="300px" src="{{asset('assets/'.$product->prod_img)}}" alt="Preview Image" >
                                </div>
									<div class="form-group">
									<label>Phụ kiện</label>
									<input required type="text" name="accessories" class="form-control" value="{{$product->prod_phukien}}">
								</div>
								<div class="form-group">
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="{{$product->prod_baohanh}}">
								</div>
								<div class="form-group">
									<label>Khuyến mãi</label>
									<input required type="text" name="promotion" class="form-control" value="{{$product->prod_khuyenmai}}">
								</div>
								<div class="form-group">
									<label>Tình trạng</label>
									<input required type="text" name="condition" class="form-control" value="{{$product->prod_tinhtrang}}">
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select required name="status" class="form-control">
										<option value="1" @if($product->prod_trangthai ==1 ) checked @endif>Còn hàng</option>
										<option value="0"@if($product->prod_trangthai ==0 ) checked @endif >Hết hàng</option>
									</select>
								</div>
								<div class="form-group">
									<label>Miêu tả</label>
									<textarea id="editor" required name="description" >{{$product->prod_mieuta}}</textarea>
								</div>
								<div class="form-group">
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($catelist as $cate)
										<option value="{{$cate->id}}" @if($product->cate == $cate->id) selected @endif>{{$cate->cate_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="featured" value="1" @if($product->prod_dacbiet == 1 ) selected @endif>
									Không: <input type="radio" checked name="featured" value="0" @if($product->prod_dacbiet == 1 ) selected @endif>
								</div>
								<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						@csrf
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div> <!--/.main-->
@stop
