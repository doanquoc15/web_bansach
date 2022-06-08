@extends('customer')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>
            {{--<div class="register-req">
                <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ
                    hàng và xem lại lịch sử mua hàng</p>
            </div>--}}
            <!--/register-req-->
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng</p>
                            <div class="form-one">
                                <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" name="shipping_email" placeholder="Email">
                                    <input type="text" name="shipping_name" placeholder="Họ và tên">
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ">
                                    <input type="text" name="shipping_phone" placeholder="Phone">
                                    <textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức giao hàng</label>
                                        <select name="shipping_method" class="form-control input-sm m-bot15 payment_select">
                                            <option value="Giao hàng tận nơi, theo địa chỉ" >Giao hàng tận nơi, theo địa chỉ</option>
                                            <option value="Giao hàng - Chuyển phát nhanh" checked="checked">Giao hàng - Chuyển phát nhanh</option>
                                            <option value="Giao hàng - Chuyển theo xe chuyên tuyến" checked="checked">Giao hàng - Chuyển theo xe chuyên tuyến</option>
                                        </select>
                                    </div>
                                    <input type="submit" value="Gửi xác nhận" name="send_order"
                                        class="btn btn-primary btn-sm">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="review-payment">
                <h2>Phương thức thanh toán</h2>

                <br/>
            </div>
            <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct
                        Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check
                        Payment</label>
                </span>
                <span>
                    <label><input type="checkbox">
                        Paypal</label>
                </span>
            </div>--}}
        </div>
    </section>
    <!--/#cart_items-->
@endsection
