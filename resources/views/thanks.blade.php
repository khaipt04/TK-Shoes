@extends('layout')
@section('title', 'Đặt Hàng')
@section('content')
    <div class="container-fluid" style="height: 50px;"></div>   
    <div class="container">
        <div class="card-body p-5 d-flex justify-content-center align-items-center my-5">
            <div class="bg-body-secondary p-5 text-center rounded-4 my-5">
                <i class="fa-solid fa-face-smile text-success fs-1"></i>
                <h5 class="mt-3">Đặt hàng thành công!</h5>
                <p>Cảm ơn bạn đã mua hàng tại TK Shoes</p>
                <a href="{{route('orders')}}">Xem chi tiết đơn hàng</a>
            </div>
        </div>
    </div>
    </div>
@endsection