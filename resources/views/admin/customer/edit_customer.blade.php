@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Cập Nhật Tài Khoản Người Dùng</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                @foreach($edit_customer as $key => $edit_value)
                    <form action="{{URL::to('/update-customer/'.$edit_value->customer_id)}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên</label>
                            <input
                                    id="customer_name"
                                    name="customer_name"
                                    type="text"
                                    class="form-control validate"
                                    value="{{$edit_value->customer_name}}"
                                    oninvalid="this.setCustomValidity('Họ tên không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Email</label>
                            <input
                                    id="customer_email"
                                    name="customer_email"
                                    type="email"
                                    class="form-control validate"
                                    value="{{$edit_value->customer_email}}"
                                    oninvalid="this.setCustomValidity('Email không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Mật khẩu</label>
                            <input
                                    id="customer_password"
                                    name="customer_password"
                                    type="password"
                                    class="form-control validate"
                                    value="{{$edit_value->customer_password}}"
                                    oninvalid="this.setCustomValidity('Mật khẩu không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Số điện thoại</label>
                            <input
                                    id="customer_phone"
                                    name="customer_phone"
                                    type="text"
                                    class="form-control validate"
                                    value="{{$edit_value->customer_phone}}"
                                    oninvalid="this.setCustomValidity('Số điện thoại không được để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Địa chỉ</label>
                            <input
                                id="customer_address"
                                name="customer_address"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->customer_address}}"
                                oninvalid="this.setCustomValidity('Số điện thoại không được để trống!')"
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
