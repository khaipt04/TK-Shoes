@extends('admin.layout')
@section('title', 'Sửa Sản Phẩm')
@section('content')
<main class="content px-3 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">SỬA TÀI KHOẢN</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 p-5 mt-4">
                        <div class="card-body row mt-3">
                            <form class="row" method="POST" action="{{ route('userupdate') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="ID" class="form-label">ID người dùng</label>
                                    <input required type="text" disabled class="form-control" id="ID" value="{{$user->id}}">
                                </div>
                                <div class="mb-3">
                                  <label for="Name" class="form-label">Họ và tên</label>
                                  <input required type="text" name="name" class="form-control" id="Name" value="{{$user->name}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="email" class="form-label">Email</label>
                                  <input required type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input required type="password" name="password" class="form-control" id="password" value="{{$user->password}}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
                                </div>
                                <div class="mb-3">
                                    <label for="condition" class="form-label">Condition</label>
                                    <select name="condition" class="form-select" id="condition">
                                        <option @if ($user->condition === 1)
                                            selected
                                        @endif value="1">Hoạt động</option>
                                        <option @if ($user->condition === 0)
                                            selected
                                        @endif value="0">Khóa</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Role" class="form-label">Vai trò</label>
                                    <select name="role" class="form-select" id="Role">
                                        <option @if ($user->role === 0)
                                            selected
                                        @endif value="0">Thành viên</option>
                                        <option @if ($user->role === 1)
                                            selected
                                        @endif value="1">Quản trị viên</option>
                                    </select>
                                </div>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary col-md-2 m-auto">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</main>
@endsection

