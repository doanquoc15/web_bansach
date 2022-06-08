@extends('customer')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-donhang-tab" href="{{ URL::to('/taikhoan') }}" role="tab"
                    aria-controls="nav-profile" >Quản lý đơn hàng</a>
                <a class="nav-item nav-link active"  href="{{ URL::to('/cap-nhat-user') }}" y>Cập nhật thông tin</a>

            </div>
            <br/>
            {{-- <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> --}}


            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                            </th>
                            <th>Tên người đặt</th>
                            <th>Tổng giá tiền</th>
                            <th>Tình trạng</th>
                            <th>Hiển thị</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_order as $key => $order)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>
                                    <?php
                                    if ($order->order_status == 1) {
                                        echo 'Chưa xử lý';
                                    } elseif ($order->order_status == 2) {
                                        echo 'Đã xử lý';
                                    } else {
                                        echo 'Hủy đơn hàng-tạm giữ';
                                    }
                                    
                                    ?>

                                </td>

                                <td>
                                    <a href="{{ URL::to('/view-order-user/' . $order->order_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i> xem chi
                                        tiết</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn hủy đơn hàng không?')"
                                        href="{{ URL::to('/delete-order/' . $order->order_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <footer class="panel-footer">
                {{-- <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50
                            items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
            </footer>
        </div>
    </div>
@endsection
