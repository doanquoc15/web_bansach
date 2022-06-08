@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Cập Nhật Danh Mục</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                @foreach($edit_category as $key => $edit_value)
                <form action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" class="tm-edit-product-form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Tên Danh Mục</label>
                        <input
                                id="category_name"
                                name="category_name"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->category_name}}"
                                oninvalid="this.setCustomValidity('Tên danh mục không để trống!')"
                                oninput="this.setCustomValidity('')"
                                required />
                    </div>
                    <div class="form-group mb-3">
                        <label id="category_edit" for="description">Mô Tả</label>
                        <textarea
                                class="form-control validate"
                                rows="3"
                                name="category_desc">{{$edit_value->category_desc}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Cập Nhật Danh Mục</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>

@endsection
