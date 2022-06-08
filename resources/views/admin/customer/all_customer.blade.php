@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-users"></i>&ensp;Quản Lý Tài Khoản Người Dùng</h4>

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

{{--
    <form action="{{URL::to('/search-customer')}}" method="get" class="navbar-form navbar-left" role="search">
--}}
        <div class="form-group" style="width:500px; float: left;">
            <input type="text" name="keyword" id = "keyword" class="form-control" placeholder="Nhập tên user cần tìm kiếm ...">
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
                    <th scope="col">Email</th>
                    <th scope="col">Mật Khẩu</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody id="list_customer">
                <?php $i = 1; ?>
                @foreach($all_customer as $key => $user)
                    <tr>
                        <td class="tm-product-name"><?php echo $i;?></td>
                        <td>{{ $user->customer_name }}</td>
                        <td>{{ $user->customer_email }}</td>
                        <td>{{ $user->customer_password }}</td>
                        <td>
                            <?php
                            if (isset($user)){
                            if($user->customer_status==1){
                            ?>
                            <a href="{{URL::to('/block-customer/'.$user->customer_id)}}"><span class="far fa-eye"></span></a>&ensp; Active
                            <?php
                            }else{ ?>
                            <a href="{{URL::to('/active-customer/'.$user->customer_id)}}"><span class="far fa-eye-slash"></span></a>&ensp;Block
                            <?php
                            } } ?>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-customer/'.$user->customer_id)}}" class="tm-product-delete-link">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i += 1; ?>
                @endforeach
                </tbody>
            </table>
            <span style="width: 100%;">{{ $all_customer->appends(['sort' => 'customer_id'])->links() }}</span>
        </div>
        <!-- table container -->
    </div>

@endsection
