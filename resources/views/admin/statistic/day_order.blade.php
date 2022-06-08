@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="section__content section__content--p30">
                <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-chart-bar"></i></i>&ensp;Thống Kê Số Liệu Bán Hàng Theo Ngày</h4>

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

                <div class="row" style="margin-bottom: 30px">
                        <div class="col-md-6" style="display: inline-flex;float: left;">
                            <form class="form-inline" method="get" action="{{URL::to('/found-order-day')}}">
                                <div class="page" style="margin: 0 auto; display: inline-flex;">
                                    <div class="form-group" style="margin-left: 10px;margin-right: 10px;float: left;">
                                        <select name="day" id="" class="form-control">
                                            <option value="">Chọn ngày</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;margin-right: 10px;float: left;">
                                        <select name="month" id="" class="form-control">
                                            <option value="">Chọn tháng</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;margin-right: 10px; float: left;">
                                        <select name="year" id="" class="form-control">
                                            <option value="">Chọn năm</option>
                                            @for ($i = 2018; $i <= 2030; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;">
                                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                                    </div>
                                </div>
                            </form>
                            {{--export report--}}
                            <form style="" action="{{url('/export-day-statistic')}}" method="POST">
                                @csrf
                                {{--<button type="submit" class="col-12 btn btn-primary"><i class="fas fa-print"></i>&ensp; Xuất báo cáo</button>--}}
                                {{--<input type="submit" value="Xuất Báo Cáo" name="export_csv" class="btn btn-success">--}}
                                <button style="width: 150px; margin-left: 50px;" class="btn btn-primary">
                                    <i class="fas fa-print"></i>&ensp;Xuất báo cáo
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped b-t b-light">
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
                                        <tr style="background: white;">
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
                                                        echo 'Đã giao hàng';
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
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
