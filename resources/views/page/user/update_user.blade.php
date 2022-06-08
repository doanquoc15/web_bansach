@extends('customer')
@section('content')
    <div>
        <div class="mainmenu pull-left">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-donhang-tab" href="{{ URL::to('/taikhoan') }}" role="tab"
                    aria-controls="nav-profile" >Quản lý đơn hàng</a>
                <a class="nav-item nav-link active"  href="{{ URL::to('/cap-nhat-user') }}" y>Cập nhật thông tin</a>

            </div>
        </div>
    </div>

    <section id="cart_items">
        <div class="container">

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Nhập thông tin cần sửa</p>
                            <div class="form-one">
                                <form action="{{ URL::to('/update-user') }}" method="POST">
                                    {{ csrf_field() }}


                                    <input type="text" name="customer_name" value="{{ $customer->customer_name }}"
                                        placeholder="Họ và tên">
                                    <input type="text" name="customer_phone" value="{{ $customer->customer_phone }}"
                                        placeholder="Phone">
                                    <input type="text" name="customer_email" value="{{ $customer->customer_email }}"
                                        placeholder="Email">
                                    <input type="submit" value="update" name="cap_nhat_user" class="btn btn-primary btn-sm">

                                </form>
                                <a href="{{ URL::to('/cap-nhat-pass') }}" style="font-style:italic; margin-bottom:20px !important;">Bạn muốn thay Đổi mật khẩu ?</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--/#cart_items-->
@endsection
