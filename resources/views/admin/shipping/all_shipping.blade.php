@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-users"></i>&ensp;Quản Lý Tài Khoản Người Giao Hàng</h4>

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

    <form action="{{URL::to('/search-shipping')}}" method="get" class="navbar-form navbar-left" role="search">
        <div class="form-group" style="width:500px; float: left;">
            <input type="text" name="username_search" id = "username_search" class="form-control" placeholder="Nhập tên user cần tìm kiếm ...">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
            <span class="fas fa-search"></span>
        </button>
        {{--
            </form>
        --}}

        <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
                <table class="table table-hover tm-table-small tm-product-table" style="color: black;">
                    <thead>
                    <tr style="background: rgb(8, 27, 133); color: white;">
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                    </thead>
                    <tbody id="list_customer">
                    <?php $i = 1; ?>
                    @foreach($all_shipping as $key => $user)
                        <tr>
                            <td class="tm-product-name"><?php echo $i;?></td>
                            <td>{{ $user->shipping_name }}</td>
                            <td>{{ $user->shipping_address }}</td>
                            <td>{{ $user->shipping_phone }}</td>
                            <td>{{ $user->shipping_email }}</td>
                            <td>
                                <?php
                                if (isset($user)){
                                if($user->shipping_method==1){
                                ?>
                                <a href="{{URL::to('/block-shipping/'.$user->shipping_id)}}"><span class="far fa-eye"></span></a>&ensp; Active
                                <?php
                                }else{ ?>
                                <a href="{{URL::to('/active-shipping/'.$user->shipping_id)}}"><span class="far fa-eye-slash"></span></a>&ensp;Block
                                <?php
                                } } ?>
                            </td>
                            <td>
                                <a href="{{URL::to('/edit-shipping/'.$user->shipping_id)}}" class="tm-product-delete-link">
                                    <i class="far fa-edit"></i>
                                </a> &nbsp; | &nbsp;
                                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-shipping/'.$user->shipping_id)}}" class="tm-product-delete-link">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i += 1; ?>
                    @endforeach
                    </tbody>
                </table>
                <span style="width: 100%;">{{ $all_shipping->appends(['sort' => 'shipping_id'])->links() }}</span>
            </div>
            <a style="width: 450px; float: left; margin-bottom: 30px;"
               href="{{ URL::to('/add-shipping') }}"
               class="btn btn-info text-uppercase mb-3">
                <i class="fas fa-plus"></i>&ensp;Thêm mới một người giao hàng</a>
            <!-- table container -->
        </div>

@endsection
