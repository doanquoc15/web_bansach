@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Cập Nhật Sản Phẩm - Sách</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                @foreach($edit_product as $key => $edit_value)
                    <form action="{{URL::to('/update-product/'.$edit_value->product_id)}}" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Tên Sản Phẩm</label>
                        <input
                                id="product_name"
                                name="product_name"
                                type="text"
                                value="{{$edit_value->product_name}}"
                                class="form-control validate"
                                oninvalid="this.setCustomValidity('Tên sản phẩm không để trống!')"
                                oninput="this.setCustomValidity('')"
                                required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Số lượng</label>
                        <div class="buttons_added">
                            <input aria-label="quantity" class="form-control validate" name="product_quantity" type="number"
                                   value="{{$edit_value->product_quantity}}"
                                   oninvalid="this.setCustomValidity('Số lượng phẩm không để trống!')"
                                   oninput="this.setCustomValidity('')"
                                   required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Mô tả sản phẩm</label>
                        <textarea
                            id = "product_edit"
                                class="form-control validate"
                                rows="3"
                                id="product_desc"
                                name="product_desc">{{$edit_value->product_desc}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Giá</label>
                        <input
                                id="product_price"
                                name="product_price"
                                type="text"
                                class="form-control validate"
                                value="{{$edit_value->product_price}}"
                                oninvalid="this.setCustomValidity('Số lượng phẩm không để trống!')"
                                oninput="this.setCustomValidity('')"
                                required />
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Hình ảnh sản phẩm</label>
                        <input
                                id="product_image"
                                name="product_image"
                                type="file"
                                class="form-control validate"/>
                        <img src = "{{ URL::to('public/uploads/product/' .$edit_value->product_image)}}" height="50" width="50') }}">
                        <input type="hidden" name="oldImage" value="{{$edit_value->product_image}}" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category">Danh mục sản phẩm</label>
                        <select class="custom-select tm-select-accounts"
                                id="product_category"
                                name="product_category">
                            @foreach($category_product as $key => $category)
                                @if($category->category_id == $edit_value->category_id)
                                <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @else <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category">Tác giả</label>
                        <select class="custom-select tm-select-accounts"
                                id="product_bookAuthor"
                                name="product_bookAuthor">
                            @foreach($bookAuthor_product as $key => $bookAuthor)
                                @if($bookAuthor->bookAuthor_id == $edit_value->bookAuthor_id)
                                <option selected value="{{$bookAuthor->bookAuthor_id}}">{{$bookAuthor->bookAuthor_name}}</option>
                                @else <option value="{{$bookAuthor->bookAuthor_id}}">{{$bookAuthor->bookAuthor_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12" style="margin-bottom: 30px;">
                        <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Cập Nhật Danh Mục</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>

@endsection
