@extends('admin.layout')
@section('title', 'Quản Lí Người Dùng')
@section('content')

    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 mb-3">QUẢN LÍ NGƯỜI DÙNG</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 p-5 mt-4">
                            <section">
                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalAdd">Thêm tài khoản</a>
                            </section>
                            <div class="card-body row mt-3">
                                <table class="table table-user">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Họ và tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Vai trò</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>
                                                    @if ($item->role === 1)
                                                        Quản trị viên
                                                    @else
                                                        Thành viên
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->condition === 1)
                                                        Hoạt động
                                                    @else
                                                        Khóa
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('userupdateform', $item->id)}}"><i class="bi bi-pencil-square"></i></a><br>
                                                    {{-- <a class="btn btn-danger mt-1" href=""><i class="bi bi-trash3"></i></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </main>
  
    <!-- Modal Add -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Tài Khoản</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('useradd')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Họ và tên</label>
                            <input name="name" type="text" class="form-control" id="Name">
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="Email">
                        </div>
                        <div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="PhoneNumber">
                        </div>
                        <div class="mb-3">
                            <label for="Pass" class="form-label">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" id="Pass">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition</label>
                            <select name="condition" class="form-select" id="condition">
                                <option selected value="1">Hoạt động</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Role" class="form-label">Vai trò</label>
                            <select name="role" class="form-select" id="Role">
                                <option selected value="0">Thành viên</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modal Update -->
    <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="Name">
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email">
                        </div>
                        <div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Số điện thoại</label>
                            <input type="number" class="form-control" id="PhoneNumber">
                        </div>
                        <div class="mb-3">
                            <label for="Pass" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="Pass">
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="Address">
                        </div>
                        <div class="mb-3">
                            <label for="Role" class="form-label">Vai trò</label>
                            <select class="form-select" id="Role">
                                <option selected value="0">Thành viên</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="condition" class="form-label">Trạng thái</label>
                            <select class="form-select" id="condition">
                                <option selected value="0">Hoạt động</option>
                                <option value="1">Khóa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

</div>
</div>
</div>
    
@endsection