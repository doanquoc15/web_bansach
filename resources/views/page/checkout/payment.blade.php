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
            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table style="border: none;">
                    <thead>
                    <tr class="cart_menu">
                        <td class="text-center">Tên Sản Phẩm</td>
                        <td class="text-center" width="200px;">Hình Ảnh</td>
                        <td class="text-center">Giá</td>
                        <td class="text-center">Số Lượng</td>
                        <td class="text-center">Thành Tiền</td>
                        <td>Thao tác</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($content as $v_content)
                        <tr>
                            <td class="text-center">
                                <h4><a href="" style="color: black;">{{ $v_content->name }}</a></h4>
                            </td>
                            <td class="text-center">
                                <a href=""><img
                                        src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"
                                        width="90" height="100" alt=""/></a>
                            </td>
                            <td class="text-center">
                                <p>{{ number_format($v_content->price) . ' ' . 'vnđ' }}</p>
                            </td>
                            <td class="text-center">
                                <div class="cart_quantity_button">
                                    <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input style="margin-top: 5px;" class="cart_quantity_input" type="number" name="cart_quantity"
                                               value="{{ $v_content->qty }}">
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
                                    echo
                                        number_format($subtotal) . ' ' . 'vnđ';
                                    ?>
                                </p>
                            </td>
                            <td class="text-center">
                                <a class="text-center"
                                   href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>

            <div class="row">
                <div class="form-group">
                    <form method="POST" action="{{ URL::to('/order-place') }}">
                        {{ csrf_field() }}

                        <select name="payment_options">
                            <option style="float: left" value="1">Trả bằng thẻ ATM</option>
                            <option style="float: left" value="2">Thanh toán khi nhận hàng</option>
                            <option style="float: left" value="3">Thanh toán bằng thẻ tín dụng</option>
                        </select>
                        <button style="float: left" type="submit" name="send_order_place" class="btn btn-danger">
                            <span>Đặt Hàng</span>
                        </button>
                    </form>
                    {{--<input style="float: right;" type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">--}}
                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
