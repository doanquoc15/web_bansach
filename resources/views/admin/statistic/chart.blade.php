@extends('admin_layout')
@section('admin_content')
    <div class="container custom-tk">
        {{--<div class="div1" style="grid-area: div1">
            <div class="ic ic-grey">
                <i class="bi bi-sticky-fill"></i>
            </div>
            --}}{{--<div class="big-text">
                <h5 class="font-bold big-size m-0">10 +</h5>
                <p class="nor-size m-0 d-block"> mới</p>
            </div>--}}{{--
        </div>--}}
        <div class="w-75 p-3">
            <div class="div2" style="grid-area: div2">
                <div class="card-body-custom">
                    <div>
                        <canvas id="PMChart" data-num1="<?php
                        $num1 = Session::get('resultNotApproved');
                        if (isset($num1)){ echo $num1;}?>" data-num2="<?php
                        $num2 = Session::get('resultApproved');
                        if (isset($num2)){ echo $num2;}?>" data-num3="<?php
                        $num3 = Session::get('resultCancelOrder');
                        if (isset($num3)){ echo $num3;}?>"></canvas>
                    </div>
                    <h5 class="text-center mt-2">Biểu đồ Tình Trạng Đơn Hàng</h5>
                </div>
            </div>
        </div>

        {{--<div class="div4" style="grid-area: div4">
            <div class="ic ic-light-blue">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            --}}{{--<div class="big-text">
                <h5 class="font-bold big-size m-0">10 +</h5>
                <p class="nor-size m-0 d-block">Bạn đọc mới</p>
            </div>--}}{{--
        </div>--}}

    </div>
@endsection
