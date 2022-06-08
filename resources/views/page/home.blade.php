@extends('customer')
@section('content')

    <div class="noidung" style=" width: 100%;">
        <div class="row">
            <!--header-->
            <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                <h1 class="header text-uppercase" style="font-weight: 400;color: red">SÁCH MỚI TUYỂN CHỌN</h1>
                {{-- <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a> --}}
            </div>
        </div>
        <div class="khoisanpham" style="padding-bottom: 2rem;">
            @foreach ($all_product as $key => $product)
                <!-- 1 san pham -->
                <div class="card">
                    <form> @csrf
                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $product->product_slug) }}" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom">
                            <img class="card-img-top anh"
                                src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" width="100px"
                                height="300px" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten">{{ $product->product_name }}</h3>
                                {{-- <small class="tacgia text-muted">{{ $product->bookAuthor_name }}</small> --}}
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{ number_format($product->product_price) . ' VNĐ' }}
                                    </div>
                                    {{-- <div class="giacu text-muted">139.000 ₫</div> --}}
                                    <div class="sale">-20%</div>


                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="row">
            <!--header-->
            <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                <h1 class="header text-uppercase" style="font-weight: 400;color: red;">SÁCH MỚI BÁN CHẠY</h1>
                {{-- <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a> --}}
            </div>
        </div>
        <div class="khoisanpham" style="padding-bottom: 2rem;">
            @foreach ($all_product as $key => $product)
                <!-- 1 san pham -->
                <div class="card">
                    <form> @csrf
                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $product->product_slug) }}" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom">
                            <img class="card-img-top anh"
                                src="{{ URL::to('public/uploads/product/' . $product->product_image) }}" width="100px"
                                height="300px" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten">{{ $product->product_name }}</h3>
                                {{-- <small class="tacgia text-muted">{{ $product->bookAuthor_name }}</small> --}}
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{ number_format($product->product_price) . ' VNĐ' }}
                                    </div>
                                    {{-- <div class="giacu text-muted">139.000 ₫</div> --}}
                                    <div class="sale">-20%</div>


                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </form>
                </div>


    @endforeach
@endsection
