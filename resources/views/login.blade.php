@extends('layout')
@section('title', 'Đăng Nhập')
@section('content')

    <div class="container-fluid" style="height: 50px;"></div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 px-5">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
            <div class="featured-image mb-3">
            <img src="img/logo/log-reg.png" class="img-fluid" style="width: 250px;">
            </div>
            <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">TK Shoes</p>
            <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Giày chính hãng chất lượng cao.</small>
        </div>
        
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <form action="" method="POST">
                    @csrf
                    <div class="header-text mb-4">
                        <h2 class="fw-bold">ĐĂNG NHẬP</h2>
                        <h2>Chào mừng trở lại!</h2>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" required placeholder="Email">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" required placeholder="Mật khẩu">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input name="remember" type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Lưu đăng nhập</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#">Quên mật khẩu?</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Đăng Nhập</button>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>
                        @php
                            Session::forget('message');
                        @endphp
                    @endif
                    <div class="row">
                        <small>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng kí ngay</a></small>
                    </div>
                </form>
            </div>
        </div> 
    </div>
    </div>

@endsection