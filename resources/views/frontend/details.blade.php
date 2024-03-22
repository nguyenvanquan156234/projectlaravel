@extends('frontend.master');
@section('title','Chi tiết sản phẩm')
@section('main')

	<link rel="stylesheet" href="css/details.css">

					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h1 style="color: black">{{ $item->prod_name }}</h1>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center" style="height="380px ; width="350px">
									<img src="{{ asset('assets/'.$item->prod_img) }}" height="380px "/>
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                                   <p><span class="chitiet">Giá: </span> <del>{{ number_format($item->prod_price, 0, ',', '.') }} VĐN</del></p>
									<p><span class="chitiet">Giá khuyến mãi: </span> <span class="price">{{number_format((float)$item->prod_khuyenmai,0,',','.')}} VĐN</span></p>
									<p> <span class="chitiet">Bảo hành:</span> {{ $item->prod_baohanh }}</p>
									<p><span class="chitiet">Phụ kiện:</span> {{ $item->prod_phukien}}</p>
									<p><span class="chitiet">Tình trạng:</span> {{ $item->prod_tinhtrang}}</p>

									<p><span class="chitiet">Trạng thái:</span>  @if($item->prod_trangthai == 1)
                                        Còn hàng
                                    @else
                                        Hết hàng
                                    @endif </p>
									<p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
								</div>
							</div>
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{{ $item->prod_mieuta }}</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach ($comment as $item)
							<ul>
								<li class="com-title">
									{{ $item->com_name }}
									<br>
									<span>{{date('d/m/Y H:i', strtotime($item->created_at))}}</span>
								</li>
								<li class="com-details">
									{{ $item->com_content}}
								</li>
							</ul>
							@endforeach
						</div>
					</div>
 @stop			<!-- end main -->
