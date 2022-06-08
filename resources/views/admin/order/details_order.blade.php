@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading" style="color: red; font-weight: bolder;">
                Thông Tin Khách Hàng
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr style="background: rgb(8, 27, 133); color: white;">
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa Chỉ Giao Hàng</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr style="color: black;">
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->customer_address}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading" style="color: red; font-weight: bolder;">
                Đơn Vị Vận Chuyển
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr style="background: rgb(8, 27, 133); color: white;">
                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="color: black;">
                        <td>{{$shipping_order_details->shipping_name}}</td>
                        <td>{{$shipping_order_details->shipping_address}}</td>
                        <td>{{$shipping_order_details->shipping_phone}}</td>
                        <td>{{$shipping_order_details->shipping_email}}</td>
                        {{--<td>{{$shipping_order_detailsipping->shipping_notes}}</td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="color: red; font-weight: bolder;">
                Chi Tiết Đơn Hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr style="background: rgb(8, 27, 133); color: white;">
                        <td>STT</td>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng mua</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)

                        @php
                            if(isset($i)){ $i++; }
                            if(!empty($details)){
                            $subtotal = $details->product_price*$details->product_sales_quantity; }
                            if(isset($total)) { $total+=$subtotal; }
                        @endphp
                        <tr style="color: black;">

                            <td>{{$i}}</td>
                            <td>{{$details->product_name}}</td>
                            <td>{{$details->product_sales_quantity}}</td>
                            <td>{{number_format($details->product_price ,0,',','.')}} VNĐ</td>
                            <td>{{number_format($subtotal ,0,',','.')}} VNĐ</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="background: lightgoldenrodyellow; color: black; font-weight: bold;">
                            Thanh toán: {{number_format($total,0,',','.')}} VNĐ
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
