@extends('admin_layout')
@section('admin_content')

    <h4 style="color: red; font-weight: bold; font-family: Tahoma; margin-bottom: 20px;"><i class="fas fa-user-cog"></i>&ensp;Quản Lý Tác Giả</h4>

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

    <form action="{{URL::to('/search-bookAuthor')}}" method="get" class="navbar-form navbar-left" role="search">
        <div class="form-group" style="width:500px; float: left;">
            <input type="text" name="search_bookAuthor" id = "search_bookAuthor" class="form-control" placeholder="Nhập tên tác giả cần tìm kiếm ...">
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
                    <th scope="col">&nbsp;</th>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Tác Giả</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($all_book_author as $key => $author)
                    <tr>
                        <th scope="row"><input type="checkbox" /></th>
                        <td class="tm-product-name"><?php echo $i;?></td>
                        <td>{{ $author->bookAuthor_name }}</td>
                        <td>
                            <?php
                            if (isset($author)){
                            if($author->bookAuthor_status==1){
                            ?>
                            <a href="{{URL::to('/unactive-book-author-product/'.$author->bookAuthor_id)}}"><span class="far fa-eye"></span></a>&ensp; Hiện
                            <?php
                            }else{ ?>
                            <a href="{{URL::to('/active-book-author-product/'.$author->bookAuthor_id)}}"><span class="far fa-eye-slash"></span></a>&ensp;Ẩn
                            <?php
                            } } ?>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-book-author-product/'.$author->bookAuthor_id)}}" class="tm-product-delete-link">
                                <i class="far fa-edit"></i>
                            </a> &ensp;|&ensp;
                            <a onclick="return confirm('Bạn có chắc là muốn xóa tác giả này ko?')" href="{{URL::to('/delete-book-author-product/'.$author->bookAuthor_id)}}" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i += 1; ?>
                @endforeach
                </tbody>
            </table>
            <span style="width: 100%;">{{ $all_book_author->appends(['sort' => 'category_id'])->links() }}</span>
        </div>
        <!-- table container -->
        <a style="width: 450px; float: left; margin-bottom: 30px;"
           href="{{ URL::to('/add-book-author-product') }}"
           class="btn btn-info text-uppercase mb-3">
            <i class="fas fa-plus"></i>&ensp;Thêm mới một tác giả</a>

        <button style="float: right ;width: 450px; margin-bottom: 30px;" class="btn btn-info text-uppercase">
            <i class="far fa-trash-alt"></i>&ensp;
            Xóa các tác giả đã chọn
        </button>
    </div>

@endsection