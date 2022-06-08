@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-chart-area"></i></i>&ensp;Thống Kê Số Liệu Bán Hàng Theo Khoảng Thời Gian</h4>

    <?php
    $message = Session::get('message_statistic');
    if (isset($message)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $message;
        Session::put('message_statistic', null); // chỉ cho hiển thị một lần ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <form method="get" action="{{ URL::to('/found-order-time') }}" style="width: 80%; display: inline-flex; float: left;">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Form code begins -->
            <div class="form-group"> <!-- Date input -->
                <label class="control-label" for="date">Ngày bắt đầu</label>
                <input class="form-control" id="date_start" name="date_start" placeholder="MM-DD-YYYY" type="date"
                       oninvalid="this.setCustomValidity('Ngày bắt đầu không được để trống!')"
                       oninput="this.setCustomValidity('')"
                       required
                       pattern="\d{4}-\d{2}-\d{2}"/>
            </div>
            <div class="form-group"> <!-- Date input -->
                <label class="control-label" for="date">Ngày kết thúc</label>
                <input class="form-control" id="date_end" name="date_end" placeholder="MM/DD/YYY" type="date"
                       oninvalid="this.setCustomValidity('Ngày kết thúc không được để trống!')"
                       oninput="this.setCustomValidity('')"
                       required
                       pattern="\d{4}-\d{2}-\d{2}"/>
            </div>
            <div class="form-group" style="float:left; margin-right: 30px;"> <!-- Submit button -->
                <button class="btn btn-primary " name="submit" type="submit">Xác Nhận</button>
            </div>
            <!-- Form code ends -->
        </div>
    </form>

    {{--export report--}}
    <form style="float: left; margin-top: 40px;" action="{{url('/export-time-statistic')}}" method="POST">
        @csrf
        {{--<input type="submit" value="Xuất Báo Cáo" name="export_csv" class="btn btn-success">--}}
        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i>&ensp; Xuất báo cáo</button>
    </form>

    <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table" style="color: black;">
                <thead>
                <tr style="background: rgb(8, 27, 133); color: white;">
                    <th scope="col">Mã ID</th>
                    <th scope="col">Tổng Tiền</th>
                    <th>Ngày tạo đơn</th>
                    <th>Tình trạng</th>
                    <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($all_order))
                    @foreach($all_order as $key => $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td><?php if(isset($order)){ echo number_format($order->order_total, 0, ',', '.') . ' VNĐ'; }?></td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <?php
                                if (isset($order)) {
                                    if($order->order_status==1) {
                                        echo 'Chưa xử lý';
                                    }
                                    else if ($order->order_status==2){
                                        echo 'Đã xử lý';
                                    }
                                    else {
                                        echo 'Hủy đơn hàng-tạm giữ';
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng không?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- table container -->
    </div>

@endsection
