@extends('frontend.master');
@section('title','Trang Chủ')
@section('main')
                    <div id="wrap-inner">
                        <div class="products">
                            <h3>sản phẩm nổi bật</h3>
                            <div class="product-list row">
                                @foreach ($dacbiet as $item)


                                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                    <a href="#"><img src="{{ asset('assets/'.$item->prod_img) }}" class="img-thumbnail"></a>
                                    <p><a href="#">{{ $item->prod_name }}</a></p>
                                    <del >Giá: {{number_format($item->prod_price,0,',','.')}} VĐN</del>
                                    <p class="price">Chỉ còn: {{number_format((float)$item->prod_khuyenmai,0,',','.')}} VĐN</p>
                                    <div class="marsk">
                                        <a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html') }}">Xem chi tiết</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="products">
                            <h3>sản phẩm mới</h3>
                            <div class="product-list row">
                                @foreach ($moi as $item)


                                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                    <a href="#"><img src="{{ asset('assets/'.$item->prod_img) }}" class="img-thumbnail"></a>
                                    <p><a href="#">{{ $item->prod_name }}</a></p>
                                    <del>Giá: {{number_format($item->prod_price,0,',','.') }}</del>
                                    <p class="price">Chỉ còn: {{number_format((float)$item->prod_khuyenmai,0,',','.')}} VĐN</p>
                                    <div class="marsk">
                                        <a href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
@stop
                    <!-- end main -->
