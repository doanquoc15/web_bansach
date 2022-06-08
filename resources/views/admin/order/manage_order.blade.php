@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-cart-arrow-down"></i>&ensp;Quản Lý Đơn Hàng</h4>

    <?php $message = Session::get('message');
    if (isset($message)){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Thành Công! </strong> <?php echo $message;
        Session::put('message', null); // chỉ cho hiển thị một lần ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <form action="{{URL::to('/search-order')}}" method="get" class="navbar-form navbar-left" role="search">
        <div class="form-group" style="width:500px; float: left;">
            <input type="text" name="username_search" id = "search_product" class="form-control" placeholder="Nhập tên cần tìm kiếm ...">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
            <span class="fas fa-search"></span>
        </button>
    </form>

    <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table" style="color: black;">
                <thead>
                <tr style="background: rgb(8, 27, 133); color: white;">
                    <th scope="col">STT</th>
                    <th scope="col">Tên Người Đặt</th>
                    <th scope="col">Thành Tiền</th>
                    <th scope="col">PT Thanh Toán</th>
                    <th scope="col">Phương Thức Giao Hàng</th>
                    <th scope="col">Tình Trạng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($all_order as $key => $order)
                    <tr>
                        <td class="tm-product-name"><?php echo $i;?></td>
                        <td>{{ $order->customer_name }}</td>
                        <td><?php if(isset($order)){ echo number_format($order->order_total, 0, ',', '.') . ' VNĐ'; }?></td>
                        <td>
                            <?php
                            if (isset($order)){
                                if($order->payment_id == 1) {
                                    echo 'Thanh toán bằng thẻ ATM'; }
                                else if ($order->payment_id == 2){
                                    echo 'Thanh toán khi nhận hàng';
                                }
                                else {
                                    echo 'Thanh toán bằng thẻ tín dụng';
                                }
                            }?>
                        </td>

                        <td>
                            <?php
                            if (isset($order)){
                                if($order->payment_id == 2) {
                                    echo 'Giao Hàng Nhanh';
                                }
                                else {
                                    echo 'ViettelPost';
                                }
                            }?>

                        </td>

                        <td>
                            <?php
                            if (isset($order)){
                            if($order->order_status == 1) {
                            echo 'Chưa xử lý'; ?>
                            &nbsp;&nbsp;<a href="{{URL::to('/edit-order/'.$order->order_id)}}" class="tm-product-delete-link"><i class="far fa-edit"></i></a>
                            <?php }
                            else if ($order->order_status == 2){
                                echo 'Đã Giao Hàng';
                            }
                            else {
                            echo 'Hủy đơn hàng - tạm giữ'; ?>
                            <a href="{{URL::to('/edit-order/'.$order->order_id)}}" class="tm-product-delete-link"><i class="far fa-edit"></i></a>
                            <?php }
                            }?>
                        </td>

                        <td>
                            <a href="{{URL::to('/details-order/'.$order->order_id)}}" class="tm-product-delete-link">
                                <i class="fas fa-info"></i>
                            </a> &ensp;|&ensp;
                            <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i += 1; ?>
                @endforeach
                </tbody>
            </table>
            <span style="width: 100%;">{{ $all_order->appends(['sort' => 'order_id'])->links() }}</span>
        </div>
        <!-- table container -->
    </div>

@endsection
