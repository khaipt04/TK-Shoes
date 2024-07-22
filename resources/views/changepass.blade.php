@extends('layout')
@section('title', 'Đổi Mật Khẩu')
@section('content')
    <div class="container-fluid" style="height: 50px;"></div>   
    <div class="container">
        <div class="card-body p-5 d-flex justify-content-center align-items-center my-5">
            <form action="" method="POST" class="p-3 px-5 rounded-3 shadow" style="width: 40%;">
                @csrf
                <h5 class="text-center mt-2 mb-4 fw-bold">ĐỔI MẬT KHẨU</h5>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu cũ</label>
                    <input required name="old_password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Mật khẩu mới</label>
                    <input required name="new_password" type="password" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword3" class="form-label">Nhập lại mật khẩu mới</label>
                    <input required name="confirm_new_password" type="password" class="form-control" id="exampleInputPassword3">
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary mb-3" value="Đổi mật khẩu">
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-danger">
                        {{Session::get('message')}}
                    </div>
                    @php
                        Session::forget('message');
                    @endphp
                @endif
                @if (Session::has('message_success'))
                    <div class="alert alert-success">
                        {{Session::get('message_success')}}
                    </div>
                    @php
                        Session::forget('message_success');
                    @endphp
                @endif
            </form>
        </div>
    </div>
    </div>
@endsection