@extends('layout')
@section('title', 'Tài Khoản')
@section('content')
    <div class="container-fluid" style="height: 50px;"></div>  
    <div class="container mb-5 p-5">
        <div class="container-fluid row">
            <div class="col-md-3 mt-5">
                <div class="bg-body-secondary pt-4 ps-4 rounded">
                    <a class="nav-link" href="{{ route('profile') }}">Tài khoản</a><br>
                    <a class="nav-link" href="{{ route('likeview') }}">Sản phẩm yêu thích</a><br>
                    <a class="nav-link" href="{{ route('orders') }}">Đơn hàng</a><br>
                    <a class="nav-link" href="#">Kho voucher</a><br>
                    <a class="nav-link" href="#">Thông báo</a><br>
                    <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a><br>
                </div>
            </div>
            <div class="col-md-9 mt-5">
                <div class="bg-body-secondary p-4 rounded">
                    <form method="POST" action="{{ route('profileupdate') }}">
                        @csrf
                        <div class="mb-3">
                            <h3>THÔNG TIN TÀI KHOẢN</h3>
                        </div>
                        <div class="mb-3">
                            <label for="">Mã Tài Khoản: {{Auth::user()->id}}</label>
                        </div>
                        <div class="mb-3">
                            <label for="">Vai trò: @if (Auth::user()->role === 1)
                                Quản trị viên
                            @else
                                Thành viên
                            @endif</label>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input disabled class="form-control" name="email" id="email" type="email" required value="{{Auth::user()->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="name">Họ và tên</label>
                            <input class="form-control" name="name" id="name" type="text" required value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Số điện thoại</label>
                            <input class="form-control" name="phone" id="phone" type="text" required value="{{Auth::user()->phone}}">
                        </div>
                        <div style="border: none;" class="mb-3">
                            <label for="address">Địa chỉ</label>
                            <input class="form-control" name="address" id="address" type="text" required value="{{Auth::user()->address}}">
                        </div>
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @php
                            Session::forget('message');
                        @endphp
                        @endif
                        <button class="btn btn-outline-success" type="submit">Lưu</button>
                        <a class="btn btn-outline-danger" href="{{ route('changepasswordform') }}">Đổi mật khẩu</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
