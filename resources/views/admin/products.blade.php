@extends('admin.layout')
@section('title', 'Quản Lí Sản Phẩm')
@section('content')

    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-3">
                <h3 class="fw-bold fs-4 mb-3">QUẢN LÍ SẢN PHẨM</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 p-5 mt-4">
                            <section">
                                <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#ModalAdd">Thêm sản phẩm</a>
                            </section>
                            <div class="card-body row mt-3">
                                <table class="table table-product">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá gốc</th>
                                            <th scope="col">Giá khuyến mãi</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Lượt xem</th>
                                            <th scope="col">Lượt mua</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td><img class="img-fluid" src="{{asset('/')}}img/product_img/{{$item->image}}" alt=""></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{ number_format($item->price,0,'.',',' ) }} đ</td>
                                                <td>{{ number_format($item->price_sale,0,'.',',' ) }} đ</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->view}}</td>
                                                <td>{{$item->sold}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('productupdateform', $item->id)}}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a><br>
                                                    <a onclick="return confirmDeletion();" class="btn btn-danger mt-1" href="{{route('productdelete', $item->id)}}">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('productadd')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="NamePD" class="form-label">Tên sản phẩm</label>
                          <input type="text" name="name" class="form-control" id="NamePD">
                        </div>
                        <div class="mb-3">
                          <label for="Price" class="form-label">Giá gốc</label>
                          <input type="number" name="price" class="form-control" id="Price">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale" class="form-label">Giá khuyến mãi</label>
                            <input type="number" name="price_sale" class="form-control" id="PriceSale">
                        </div>
                        <div class="mb-3">
                            <label for="Color" class="form-label">Màu sắc</label>
                            <input type="text" name="color" class="form-control" id="Color">
                        </div>
                        <div class="mb-3">
                            <label for="Quantity" class="form-label">Số lượng</label>
                            <input type="number" name="quantity" class="form-control" id="Quantity">
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Danh mục</label>
                            <select name="category_id" class="form-select" id="Category">
                                <option selected>Chọn danh mục...</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Brand</label>
                            <select name="brand_id" class="form-select" id="Category">
                                <option selected>Chọn brand...</option>
                                @foreach ($brands as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Hình ảnh</label>
                            <input name="image" type="file" class="form-control" id="Image">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    {{-- <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('productupdate') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="IDSP" class="form-label">ID sản phẩm</label>
                            <input type="text" disabled class="form-control" id="IDSP" value="
                            @if (isset($product_update->id))
                                {{$product_update->id}}
                            @endif
                            ">
                        </div>
                        <div class="mb-3">
                          <label for="NamePD" class="form-label">Tên sản phẩm</label>
                          <input type="text" class="form-control" id="NamePD" value="
                            @if (isset($product_update->id))
                                {{$product_update->name}}
                            @endif
                            ">
                        </div>
                        <div class="mb-3">
                          <label for="Price" class="form-label">Giá gốc</label>
                          <input type="number" class="form-control" id="Price">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale" class="form-label">Giá khuyến mãi</label>
                            <input type="number" class="form-control" id="PriceSale">
                        </div>
                        <div class="mb-3">
                            <label for="Color" class="form-label">Màu sắc</label>
                            <input type="text" class="form-control" id="Color">
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Danh mục</label>
                            <select class="form-select" id="Category">
                                <option selected value="1">Nike</option>
                                <option value="2">Adidas</option>
                                <option value="3">LV</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="Image">
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