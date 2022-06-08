@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Thêm Mới Một Người Giao Hàng</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="{{URL::to('/save-shipping')}}" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Tên Người Giao Hàng</label>
                        <input
                            id="shipping_name"
                            name="shipping_name"
                            type="text"
                            class="form-control validate"
                            oninvalid="this.setCustomValidity('Tên người giao hàng không để trống!')"
                            oninput="this.setCustomValidity('')"
                            required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Địa Chỉ</label>
                        <input
                            id="shipping_address"
                            name="shipping_address"
                            type="text"
                            class="form-control validate"
                            oninvalid="this.setCustomValidity('Địa chỉ không để trống!')"
                            oninput="this.setCustomValidity('')"
                            required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Số điện thoại</label>
                        <input
                            id="shipping_phone"
                            name="shipping_phone"
                            type="text"
                            class="form-control validate"
                            oninvalid="this.setCustomValidity('Số điện thoại không để trống!')"
                            oninput="this.setCustomValidity('')"
                            required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Email</label>
                        <input
                            id="shipping_email"
                            name="shipping_email"
                            type="text"
                            class="form-control validate"
                            oninvalid="this.setCustomValidity('Email không để trống!')"
                            oninput="this.setCustomValidity('')"
                            required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="category">Trạng Thái</label>
                        <select class="custom-select tm-select-accounts"
                                id="shipping_status"
                                name="shipping_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Thêm Mới Người Giao Hàng</button>
                    </div>
                </form>
            </div>
        </div>

@endsection
