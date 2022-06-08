@extends('customer')
@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center" style="background:rgb(0, 200, 255);margin-top:15px;padding:10px;color:white;">Kết quả tìm
            kiếm</h2>
        <div style="display:flex !important;flex-wrap: wrap;">
            @foreach ($search_product as $key => $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" alt=""
                                    style="width:300px; height:350px;" />

                                <p style="float:left; margin-left:60px;color:orange">{{ $product->product_name }}</p>
                                ` <h2 style="float:left; margin-left:60px;">
                                    {{ number_format($product->product_price) . ' ' . 'VNĐ' }}
                                </h2>
                            </div>
                            <div class="choose">
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;float:left; margin-left:60px;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/recommended_items-->
@endsection
