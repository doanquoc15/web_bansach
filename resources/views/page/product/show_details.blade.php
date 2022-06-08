@extends('customer')
@section('content')
    @foreach ($product_details as $key => $value)
        <div class="row" style="margin-top:40px">
            <style type="text/css">
                .lSSlideOuter .lSPager.lSGallery img {
                    display: block;
                    height: 140px;
                    max-width: 100%;
                }
                li .active{
                    border: 2px solid #A90707;
                }
            </style>
            <!-- ảnh  -->
            <div class="col-md-5 khoianh">
                <div class="anhto mb-4">
                    <ul id="imageGallery">
                        <li data-thumb="{{ asset('public/uploads/product/' . $value->product_image) }}" data-src="{{  asset('public/uploads/product/' . $value->product_image) }}">
                            <img width="100%" src="{{  asset('public/uploads/product/' . $value->product_image) }}" />
                        </li>
                        @foreach ($list_image as $key=>$image)
                            <li data-thumb="{{ asset('public/frontend/images/' . $image->image) }}" data-src="{{ asset('public/frontend/images/' . $image->image) }}">
                                <img width="100%" src="{{ asset('public/frontend/images/' . $image->image) }}" />
                            </li>
                         @endforeach
                    </ul>
                </div>
            </div>
            <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
            <div class="col-md-7 khoithongtin">
                <div class="row">
                    <div class="col-md-12 header">
                        <h4 class="ten">{{ $value->product_name }}</h4>
                        <div class="rate">
                            <div class="sao" style="display:flex;">
                                @for($count=1; $count <= 5; $count++)
                                        @php
                                            if($count <= $star_number){
                                                $color='color:#ffcc00';
                                            }
                                            else{
                                                $color="color:#ccc";
                                            }
                                        @endphp
                                        <li title="Đánh giá sao"
                                            id="{{ $value->product_id }}-{{$count }}"
                                            data-index="{{ $count }}"
                                            data-product_id="{{ $value->product_id }}"
                                            data-rating="{{ $star_number }}"
                                            class="rating"
                                            style="cursor:pointer;{{ $color }};font-size:18px;list-style:none;">
                                            &#9733
                                        </li>
                                    @endfor
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-7">
                        <div class="gia">
                            <div class="">Mã ID : <span class="giacu ml-2">{{ $value->product_id }}</span></div>
                            <form action="{{ URL::to('/save-cart') }}" method="POST">
                                {{ csrf_field() }}
                            <div class="giaban">Giá bán tại BookStore: <span class="giamoi font-weight-bold">{{ number_format($value->product_price) . ' VNĐ' }}</div>
                            <div class="tietkiem">Tiết kiệm: <b>27.800 ₫</b> <span class="sale">-20%</span>
                            </div>
                        </div>
                        <div class="uudai my-3">
                            <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại DealBook:</h6>
                            <ul>
                                <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ ở
                                    Tỉnh/Thành khác <a href="#">>> Chi tiết</a></li>
                                <li><b>Combo sách HOT - GIẢM 25% </b><a href="#">>>Xem ngay</a></li>
                                <li>Tặng Bookmark cho mỗi đơn hàng</li>
                                <li>Bao sách miễn phí (theo yêu cầu)</li>
                            </ul>
                        </div>
                        <div class="soluong d-flex">
                            <label class="font-weight-bold">Số lượng: </label>
                            <div class="input-number input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text btn-spin btn-dec">-</span>
                                </div>
                                <input name="qty" type="number" min="1" value="1" class="soluongsp  text-center">
                                <div class="input-group-append">
                                    <span class="input-group-text btn-spin btn-inc">+</span>
                                </div>
                            </div>
                        </div>
                        <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}" />
                        <button type="submit"class="nutmua btn w-100 text-uppercase">Chọn mua</button>
                        <a class="huongdanmuahang text-decoration-none" href="#">(Vui lòng xem hướng dẫn mua
                            hàng)</a>
                        </form>
                        <small class="share">Share: </small>
                        
                        <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/"
                            data-width="300px" data-layout="button" data-action="like" data-size="small" data-share="true">
                        </div>
                    </div>
                    <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                    <div class="col-md-5">
                        <div class="thongtinsach">
                            <ul>
                                <li>Tác giả: <a href="#" class="tacgia">{{  $value->bookAuthor_name  }}</a></li>
                                <li>Danh mục: <b>{{ $value->category_name  }}</b></li>
                                <li>Số lượng: <b>{{ $value->product_quantity }}</b></li>
                                <li>Tình trạng: <b>Còn hàng</b></li>
                                <li>Dịch giả: Skye Phan;</li>
                                <li>Nhà xuất bản: Nhà Xuất Bản Thanh Niên</li>
                                <li>Hình thức bìa: <b>Bìa mềm</b></li>
                                <li>Số trang: <b>336</b></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
            <div class="product-description col-md-9">
                <!-- 2 tab ở trên  -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab" data-toggle="tab"
                            href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu" aria-selected="true">Giới
                            thiệu</a>
                        <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                            href="#nav-danhgia" role="tab" aria-controls="nav-danhgia" aria-selected="false">Đánh
                            giá của độc giả</a>
                            <a class="nav-item nav-link text-uppercase" id="nav-binhluan-tab" data-toggle="tab"
                            href="#nav-binhluan" role="tab" aria-controls="nav-binhluan" aria-selected="false">Phản hồi người dùng</a>
                    </div>
                </nav>
                <!-- nội dung của từng tab  -->
                <div class="tab-content" id="nav-tabContent">
                    {{-- Giới thiệu --}}
                    <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                        aria-labelledby="nav-gioithieu-tab">
                        <h6 class="tieude font-weight-bold">{{ $value->product_name }}</h6>
                        
                        <p style="margin-top:10px !important;">
                            <span>{{ $value->product_desc }}</span>
                        </p>
                    </div>
                    {{-- Dánh giá --}}
                    <div class="tab-pane fade" id="nav-danhgia" role="tabpanel" aria-labelledby="nav-danhgia-tab">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <p class="tieude">Đánh giá trung bình</p>
                                <div class="diem">{{ $star_number }}/5 </div>
                                <div class="sao" style="display:flex;margin-left:55px;">
                                    @for($count=1; $count <= 5; $count++)
                                            @php
                                                if($count <= $star_number){
                                                    $color='color:#ffcc00';
                                                }
                                                else{
                                                    $color="color:#ccc";
                                                }
                                            @endphp
                                            <li title="Đánh giá sao"
                                                id="{{ $value->product_id }}-{{$count }}"
                                                data-index="{{ $count }}"
                                                data-product_id="{{ $value->product_id }}"
                                                data-rating="{{ $star_number }}"
                                                class="rating"
                                                style="cursor:pointer;{{ $color }};font-size:18px;list-style:none;">
                                                &#9733
                                            </li>
                                        @endfor
                                </div>
                                <p class="sonhanxet text-muted">({{ count($all_comment) }} nhận xét)</p>
                            </div>
                            <div class="col-md-5">
                                <div class="tiledanhgia text-center">
                                    <div class="motthanh d-flex align-items-center">5<i class="fa fa-star"></i>
                                        <div class="progress mx-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 0%
                                    </div>
                                    <div class="motthanh d-flex align-items-center">4 <i class="fa fa-star"></i>
                                        <div class="progress mx-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 0%
                                    </div>
                                    <div class="motthanh d-flex align-items-center">3 <i class="fa fa-star"></i>
                                        <div class="progress mx-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 0%
                                    </div>
                                    <div class="motthanh d-flex align-items-center">2 <i class="fa fa-star"></i>
                                        <div class="progress mx-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 0%
                                    </div>
                                    <div class="motthanh d-flex align-items-center">1 <i class="fa fa-star"></i>
                                        <div class="progress mx-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 0%
                                    </div>
                                    <div class="btn vietdanhgia mt-3" style="margin-bottom:30px">Viết đánh giá của bạn</div>
                                </div>
                                <!-- nội dung của form đánh giá  -->
                                <div class="formdanhgia">
                                    <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                    <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                    <form action="{{ URL::to('/add-comment') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                            @for($count=5; $count >= 1; $count--)
                                                <input type="radio" value="{{ $count }}" name="star_number" id="star{{ $count }}" for="star{{ $count}}"><label ></label>
                                            @endfor
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="text" class="txtFullname w-100" name="name"
                                                placeholder="Mời bạn nhập tên(Bắt buộc)">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="txtEmail w-100" name="email"
                                                placeholder="Mời bạn nhập email(Bắt buộc)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="txtComment w-100" name="rating"
                                                placeholder="Đánh giá của bạn về sản phẩm này">
                                        </div>
                                        <button type="submit" class="btn nutguibl">Gửi bình luận</button>

                                    </form>
                                    @if (isset($all_comment))
                                   
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- het tab nav-danhgia  -->
                    <div style="margin-bottom:30px;" class="tab-pane fade show ml-3" id="nav-binhluan" role="tabpanel"aria-labelledby="nav-binhluan-tab">
                        <p style="margin:20px 0px;font-weight:600;font-size:20px;">Nội dung binh luận</p>
                        @if($all_comment != null)
                        @foreach ($all_comment as $key=>$value) 
                            <div class="tiledanhgia" style="margin-top:20px;">
                                <div class=" d-flex align-items-center"><img style="width:40px; height:40px; border-radius:50%;" src=" {{asset('public/frontend/images/user_comment.jpg')}}" alt=""> </i>
                                    <div style="margin-left:15px;color:red;font-weight:600;">
                                        {{ $value->name }}
                                    </div> 
                                </div>
                                <div style=" margin-left:70px;font-size:10px; color:grey;">
                                    {{ date('d/m/Y H:i',strtotime($value->created_at))}}
                                </div> 
                                <div style=" margin-left:70px;">
                                    {{ $value->rating }}
                                </div> 
                            </div>
                        @endforeach
                        @else
                        <div class="tiledanhgia" style="margin-top:20px;">
                            <p style="font-style: italic">Sản phẩm hiện chưa có bình luận nào. Mời bạn nhập bình luận.</p>
                        </div>
                        @endif
                        
                        
                    </div>
                </div>
                <!-- het tab-content  -->
            </div>
            <!-- het product-description -->
        </div>
        <!-- het row  -->
        </div>
        <!--/recommended_items-->
        @endforeach
    @endsection
