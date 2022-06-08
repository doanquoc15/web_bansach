<nav class="navbar navbar-expand-md bg-white navbar-light">
    <div class="container">
        <!-- logo  -->
        <a class="navbar-brand" href="{{URL('/')}}" style="color:
            #2111cf;"><b>QuốcTuấn</b></a>

        <!-- navbar-toggler  -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
         
            <!-- form tìm kiếm  -->
            <form class="form-inline ml-auto my-2 my-lg-0 mr-3" action="{{URL::to('/tim-kiem')}}" method="POST">
                {{csrf_field()}}
                <div class="input-group" style="width: 520px;">
                    <input type="text" class="form-control"name="keywords_submit" aria-label="Small" placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <button type="submit" class="btn" name="search_items" style="background-color: #009dff; color:
                            white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                {{-- <div class="search">
                    <input type="text" class="input_search" placeholder="Search...">
                    <button class="btn_search">
                      <i class="fas fa-search"></i>
                    </button>
                  </div> --}}
            </form>

            <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
            <ul class="navbar-nav mb-1 ml-auto">
                <div class="dropdown">
                    <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                        <a href="#" class="btn btn-secondary
                            rounded-circle">
                            <i class="fa fa-user"></i>
                        </a>
                        <?php
                        $customer_name = Session::get('customer_name');
                        $customer_id = Session::get('customer_id');
                        if($customer_id!=NULL){
                        ?>
                        <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                            {{ $customer_name }}
                        </a>

                        <?php
                        }else{
                        ?>

                        <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                            Tài khoản
                        </a>
                        <?php
                        }
                        ?>
                        {{-- <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                            Tàikhoản
                        </a> --}}
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item nutdangky text-center   mb-2" href="{{URL::to('/register-checkout')}}">Đăng ký</a>
                        <?php if ($customer_id != NULL){?>
                            <a href="{{URL::to('/logout-checkout')}}" class="dropdown-item nutdangnhap text-center">Đăng xuất</a>
                            <a href="{{ URL::to('/taikhoan') }}" class="text-center mb-2 dropdown-item" style="margin-top:10px">Thông tin </a>
                        <?php
                        } else{ ?>
                            <a href="{{URL::to('/loginCustomer-checkout')}}" class="dropdown-item nutdangnhap text-center">Đăng nhập</a>
                        <?php } ?>
                    </div>
                </div>
                <li class="nav-item giohang">
                    <a href="gio-hang.html" class="btn btn-secondary
                        rounded-circle">
                        <i class="fa fa-shopping-cart"></i>
                        {{--<div class="cart-amount">0</div>--}}
                    </a>
                    <a class="nav-link text-dark giohang text-uppercase" href="{{ URL::to('/show-cart') }}"
                        style="display:inline-block; margin-top:7px">Giỏ Hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
