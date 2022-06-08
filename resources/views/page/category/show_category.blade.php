@extends('customer')
@section('content')
    <div class="features_items">
        <!--features_items-->
        <div class="fb-like" data-href="" data-width="" data-layout="button_count" data-action="like"
            data-size="small" data-share="false"></div>
        @foreach ($category_name as $key => $name)
            <h2 class="title text-center">{{ $name->category_name }}</h2>
        @endforeach
        {{--  --}}

        {{--  --}}
        <!--@foreach ($category_by_id as $key => $product)
            <a href="{{ URL::to('/chi-tiet-san-pham/' . $product->product_slug) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" alt="" />

                                <p style="float:left; margin-left:60px;color:orange">{{ $product->product_name }}</p>
`                                <h2 style="float:left; margin-left:60px;">{{ number_format($product->product_price) . ' ' .'VNĐ' }}
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
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        @endforeach-->
        <div style="display:flex;flex-wrap:wrap">
            @foreach ($category_by_id as $key => $product)
                <a href="{{ URL::to('/chi-tiet-san-pham/' . $product->product_slug) }}" style="width:32%">
                    <div class="col-sm-4" >
                        <div class="product-image-wrapper"style="width:250%">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}"
                                        alt="" />

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
                                            <li><span class="text-muted"> nhận xét</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!--features_items-->

    <!--/recommended_items-->
@endsection
