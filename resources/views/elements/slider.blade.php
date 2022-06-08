<!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
<section class="duoinavbar">
    <div class="container text-white">
        <div class="row justify">
            <div class="col-md-3">
                <div class="categoryheader">
                    <div class="noidungheader text-white" style="background-color: #009dff">
                        <i class="fa fa-bars"></i>
                        <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="benphai float-right">
                    <div class="hotline">
                        <i class="fa fa-phone"></i>
                        <span>Hotline:<b>1900 1999</b> </span>
                    </div>
                    <i class="fas fa-comments-dollar"></i>
                    <a href="#">Hỗ trợ trực tuyến </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- noi dung danh muc sach(categories) + banner slider -->
<section class="header bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-right: -15px;">
                <!-- CATEGORIES -->
                <div style="border: none;" class="categorycontent">
                    <ul style="background: linear-gradient(#ffcbcb,#ffbebe,#fff3f3, #ffffff);">
                        @foreach ($category as $key => $cate)
                            <li class="liheader"><a href="{{ URL::to('/danh-muc-san-pham/' . $cate->category_slug) }}" class="header text-uppercase">{{ $cate->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- banner slider  -->
            <div class="col-md-9 px-0">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="nutcarousel carousel-indicators
                                rounded-circle">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#"><img src="{{ asset('public/frontend/images/banner-sach-moi.jpg') }}"
                                    class="img-fluid" style="height: 386px;" width="900px" alt="First slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#"><img src="{{ asset('public/frontend/images/banner-beethoven.jpg') }}"
                                    class="img-fluid" style="height: 386px;" width="900px" alt="Second slide"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#"><img
                                    src="{{ asset('public/frontend/images/neu-toi-biet-duoc-khi-20-full-banner.jpg') }}"
                                    class="img-fluid" style="height: 386px;" alt="Third
                                            slide"></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
