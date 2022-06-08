@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Thêm Mới Một Tác giả</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="{{URL::to('/save-book-author-product')}}" class="tm-edit-product-form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Tên tác giả</label>
                        <input
                                id="bookAuthor_name"
                                name="bookAuthor_name"
                                type="text"
                                class="form-control validate"
                                oninvalid="this.setCustomValidity('Tên tác giả không để trống!')"
                                oninput="this.setCustomValidity('')"
                                required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Tên đường dẫn</label>
                        <input
                            id="bookAuthor_slug"
                            name="bookAuthor_slug"
                            type="text"
                            class="form-control validate"
                            oninvalid="this.setCustomValidity('Tên đường dẫn không để trống!')"
                            oninput="this.setCustomValidity('')"
                            required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Giới thiệu tác giả</label>
                        <textarea
                            id="bookAuthor_new"
                                class="form-control validate"
                                rows="3"
                                name="bookAuthor_desc"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Trạng Thái</label>
                        <select class="custom-select tm-select-accounts"
                                id="bookAuthor_status"
                                name="bookAuthor_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Thêm Mới Tác Giả</button>
                    </div>
                </form>
            </div>
        </div>

@endsection
