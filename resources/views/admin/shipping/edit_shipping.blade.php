@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Cập Nhật Tài Khoản Người Giao Hàng</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                @foreach($edit_shipping as $key => $edit_value)
                    <form action="{{URL::to('/update-shipping/'.$edit_value->shipping_id)}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên</label>
                            <input
                                id="shipping_name"
                                name="shipping_name"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->shipping_name}}"
                                oninvalid="this.setCustomValidity('Họ tên không được để trống!')"
                                oninput="this.setCustomValidity('')"
                                required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Địa Chỉ</label>
                            <input
                                id="shipping_address"
                                name="shipping_address"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->shipping_address}}"
                                oninvalid="this.setCustomValidity('Địa chỉ không được để trống!')"
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
                                value="{{$edit_value->shipping_phone}}"
                                oninvalid="this.setCustomValidity('Số điện thoại không được để trống!')"
                                oninput="this.setCustomValidity('')"
                                required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Email</label>
                            <input
                                id="shipping_email"
                                name="shipping_email"
                                type="email"
                                class="form-control validate"
                                value="{{$edit_value->shipping_email}}"
                                oninvalid="this.setCustomValidity('Email không được để trống!')"
                                oninput="this.setCustomValidity('')"
                                required/>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category" style="margin-bottom: 25px;">Cập Nhật Tài Khoản</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

@endsection
