@extends('admin.layout')
@section('title', 'Quản Lí Danh Mục')
@section('content')

    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 mb-3">QUẢN LÍ DANH MỤC</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 p-5 mt-4">
                            <section">
                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalAdd">Thêm danh mục</a>
                            </section>
                            <div class="card-body row mt-3">
                                <table class="table table-category">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Tên danh mục</th>
                                            <th scope="col">Số sản phẩm</th>
                                            <th scope="col">Hide</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nike</td>
                                            <td>30</td>
                                            <td>Có</td>
                                            <td>
                                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalUpdate"><i class="bi bi-pencil-square"></i></a><br>
                                                <a class="btn btn-danger mt-1" href=""><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Adidas</td>
                                            <td>10</td>
                                            <td>Có</td>
                                            <td>
                                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalUpdate"><i class="bi bi-pencil-square"></i></a><br>
                                                <a class="btn btn-danger mt-1" href=""><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>LV</td>
                                            <td>20</td>
                                            <td>Không</td>
                                            <td>
                                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalUpdate"><i class="bi bi-pencil-square"></i></a><br>
                                                <a class="btn btn-danger mt-1" href=""><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                          <label for="NameCT" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control" id="NameCT">
                        </div>
                        <div class="mb-3">
                          <label for="Hide" class="form-label">Hide</label>
                          <select class="form-select" id="Hide">
                            <option selected value="1">Hiển thị</option>
                            <option value="2">Không hiển thị</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
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
                          <label for="NameCT" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control" id="NameCT">
                        </div>
                        <div class="mb-3">
                          <label for="Hide" class="form-label">Hide</label>
                          <select class="form-select" id="Hide">
                            <option selected value="1">Hiển thị</option>
                            <option value="2">Không hiển thị</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
    
@endsection