@extends('admin_layout')
@section('admin_content')

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Cập Nhật Tình Trạng Đơn Hàng</h2>
        </div>
    </div>

    <div class="col-md-6">
        @foreach($edit_order as $key => $edit_value)
            <form action="{{URL::to('/update-order/'.$edit_value->order_id)}}" class="tm-edit-product-form"
                  method="post">
                {{ csrf_field() }}
                <select name="select_order_status" class="form-control">
                    @if($edit_value->order_status == 1)
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$edit_value->order_id}}" selected value="1">Chưa xử lý</option>
                        <option id="{{$edit_value->order_id}}" value="2">Đã giao hàng</option>
                        <option id="{{$edit_value->order_id}}" value="3">Hủy đơn hàng - tạm giữ</option>
                    @elseif($edit_value->order_status == 2)
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$edit_value->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$edit_value->order_id}}" selected value="2">Đã giao hàng</option>
                        <option id="{{$edit_value->order_id}}" value="3">Hủy đơn hàng - tạm giữ</option>
                    @else
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$edit_value->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$edit_value->order_id}}" value="2">Đã giao hàng</option>
                        <option id="{{$edit_value->order_id}}" selected value="3">Hủy đơn hàng - tạm giữ</option>
                    @endif
                </select>
        @endforeach
    </div>

    <div class="col-md-6" style="margin-top: 20px;">
            <select name="select_shipping_order" class="form-control">
                <option value="42">----Chọn Người Giao Hàng-----</option>
                @foreach($shipper_order as $key => $edit_value)
                <option id="" value="{{$edit_value->shipping_id}}">{{$edit_value->shipping_name}} | SĐT: {{$edit_value->shipping_phone}}</option>
                @endforeach
            </select>
    </div>

    <div class="form-group col-sm-6" style="margin-top: 20px;">
        <button type="submit" name="update_order" class="btn btn-info form-control">Cập nhật đơn hàng
        </button>
    </div>
    </form>
    </div>
@endsection
