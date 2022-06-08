@extends('customer')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active"> > Giỏ hàng của bạn</li>
                </ol>
            </div>

            <a style="margin:-20px 0px 20px 0px" class="btn btn-default check_out" href="{{ URL::to('/') }}">Mua thêm
                hàng</a>

            <?php $message = Session::get('message');
            if (isset($message)){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error! </strong> <?php echo $message;
                Session::put('message', null); // chỉ cho hiển thị một lần ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed" style="border: none;">
                    <thead style="border: none;">
                    <tr class="cart_menu">
                        <td class="text-center">Hình ảnh</td>
                        <td class="text-center">Tên Sản Phẩm</td>
                        <td class="text-center">Giá</td>
                        <td class="text-center">Số lượng</td>
                        <td class="text-center">Thành Tiền</td>
                        <td class="text-center">Thao tác</td>
                    </tr>
                    </thead>

                    <tbody style="border: none;">
                    @foreach ($content as $v_content)
                        <tr style="border-bottom:1px solid rgb(198, 198, 198)">
                            <td class="text-center" style="border:none">
                                <a href=""><img style="object-fit:contain"
                                                src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"
                                                width="100px" alt=""/></a>
                            </td>
                            <td class="text-center" style="width:20%">
                                <h4><a href="" style="color: black">{{ $v_content->name }}</a></h4>
                            </td>
                            <td class="text-center">
                                <p>{{ number_format($v_content->price) . ' ' . 'vnđ' }}</p>
                            </td>
                            <td class="text-center">
                                <div class="cart_quantity_button">
                                    <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input style="width:40px; margin-top: 5px;" class="cart_quantity_input" type="number"
                                               name="cart_quantity" value="{{ $v_content->qty }}">
                                        <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                               class="form-control">
                                        <input type="submit" value="Cập nhật" name="update_qty"
                                               class="btn btn-danger">
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">
                                <p class="text-center">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal) . ' ' . 'vnđ';
                                    ?>
                                </p>
                            </td>
                            <td class="text-center" style="border:none">
                                <a class="cart_quantity_delete"
                                   href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
    <div id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <span
                        style="color: red;font-size:20px; font-weight:bold; color:#ff0000; margin:-10px 10px;">Thông tin đơn hàng : </span>
                    <div class="total_area" style="height: 670px;">
                        <form method="POST" action="{{ URL::to('/order-place') }}">
                            {{ csrf_field() }}
                        <ul>
                            <li>Tổng (Giá sản phẩm đã bao gồm VAT)
                                <span>{{  Cart::initial() . ' ' . 'vnđ'}}</span>
                            </li>
                            {{--<li>Thuế VAT 10%
                                <span>{{ Cart::tax() . ' ' . 'vnđ' }}</span>
                            </li>--}}
                            {{--<li>Địa chỉ giao hàng mặc định (Lấy từ tài khoản)
                                <span>{{  Cart::initial() . ' ' . 'vnđ'}}</span>
                            </li>--}}
                            <li>Phí vận chuyển
                                <span><?php $transportFee = 0; if(Cart::initialFloat() >= 300000) echo 'Free';
                                elseif (Cart::initialFloat() >= 200000) {$transportFee = '15000'; echo number_format($transportFee) . ' ' . 'vnđ';}
                                        elseif (Cart::initialFloat() >= 100000) {$transportFee = '21000'; echo number_format($transportFee) . ' ' . 'vnđ';}
                                else {$transportFee = '27000'; echo number_format($transportFee) . ' ' . 'vnđ';} ?></span>
                            </li>
                            <li>Thành tiền
                                <?php $sum = Cart::initialFloat(); $sumResult = $sum + $transportFee; ?>
                                <input type="hidden" name="sumPrice" value="<?php echo $sumResult;?>">
                                <span><?php echo number_format($sumResult). ' ' . 'vnđ' ;?></span>
                            </li>
                            <li>Ghi chú đơn hàng
                                <textarea id="ckeditor_cart" style="height: 200px; margin-top: 10px;" name="order_note" placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                            </li>

                            <div class="form-group" style="margin-top: 10px;margin-left: 10px;">
                                <label for="exampleInputPassword1">Chọn hình thức giao hàng</label>
                                <select name="shipping_method" class="form-control input-sm m-bot15 payment_select">
                                    <option value="2" checked="checked">Giao Hàng Nhanh</option>
                                    <option value="3" checked="checked">ViettelPost</option>
                                </select>
                            </div>

                            <div class="form-group" style="margin-top: 10px;margin-left: 10px;">
                                <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                <select name="payment_options" class="form-control input-sm m-bot15 payment_select">
                                    <option  value="1">Trả bằng thẻ ATM</option>
                                    <option  value="2">Thanh toán khi nhận hàng</option>
                                    <option  value="3">Thanh toán bằng thẻ tín dụng</option>
                                </select>
                            </div>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id != NULL){
                        ?>
                            <button style="float: right" type="submit" name="send_order_place" class="btn btn-danger" onclick="alert('Thành Công! Đơn Hàng Đang Chờ xử lý.')">
                                <span>Đặt Hàng</span>
                            </button>
                        <?php
                        }else{
                        ?>
                        <a  class="btn btn-default check_out" style="color:white;"
                           href="{{URL::to('/loginCustomer-checkout')}}" >Thanh toán</a>
                        <?php } ?>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6">
                    <span style="color: red;font-size:20px; font-weight:bold; color:#ff0000; margin:-10px 10px;">Phí vận chuyển : </span>
                    <div class="total_area" style="min-height :310px !important; padding-left:15px;">
                        BẢNG TÍNH PHÍ GIAO HÀNG </br>
                        <ul>
                            <li>Miễn phí giao hàng với đơn hàng có đơn giá lớn hơn hoặc bằng 300.000 VNĐ trên toàn quốc.</li>
                            <li>Phí vận chuyển chỉ 15.000 VNĐ với đơn hàng có đơn giá lớn hơn hoặc bằng 200.000 VNĐ trên toàn quốc.</li>
                            <li>Phí vận chuyển 21.000 VNĐ với đơn hàng có đơn giá lớn hơn hoặc bằng 100.000 VNĐ trên toàn quốc.</li>
                            <li>Phí vận chuyển 27.000 VNĐ với đơn hàng có đơn giá dưới 100.000 VNĐ trên toàn quốc</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#do_action-->
@endsection
