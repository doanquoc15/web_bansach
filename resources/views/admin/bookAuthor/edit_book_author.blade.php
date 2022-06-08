@extends('admin_layout')
@section('admin_content')

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Cập Nhật Tác Giả</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                @foreach($edit_book_author as $key => $edit_value)
                    <form action="{{URL::to('/update-book-author-product/'.$edit_value->bookAuthor_id)}}" class="tm-edit-product-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="name">Tên Tác Giả</label>
                            <input
                                    id="bookAuthor_name"
                                    name="bookAuthor_name"
                                    type="text"
                                    class="form-control validate"
                                    value="{{$edit_value->bookAuthor_name}}"
                                    oninvalid="this.setCustomValidity('Tên tác giả không để trống!')"
                                    oninput="this.setCustomValidity('')"
                                    required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Giới thiệu tác giả</label>
                            <textarea
                                id="bookAuthor_edit"
                                    class="form-control validate"
                                    rows="3"
                                    name="bookAuthor_desc">{{$edit_value->bookAuthor_desc}}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block text-uppercase" name="add_category">Cập Nhật Tác Giả</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

@endsection
