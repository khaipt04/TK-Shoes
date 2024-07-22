@extends('admin.layout')
@section('title', 'Sửa Sản Phẩm')
@section('content')
<main class="content px-3 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">SỬA SẢN PHẨM</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 p-5 mt-4">
                        <div class="card-body row mt-3">
                            <form class="row" method="POST" action="{{ route('productupdate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="IDSP" class="form-label">ID sản phẩm</label>
                                    <input type="text" disabled class="form-control" id="IDSP" value="{{$product->id}}">
                                </div>
                                <div class="mb-3">
                                  <label for="NamePD" class="form-label">Tên sản phẩm</label>
                                  <input required type="text" name="name" class="form-control" id="NamePD" value="{{$product->name}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="Price" class="form-label">Giá gốc</label>
                                  <input required type="number" name="price" class="form-control" id="Price" value="{{$product->price}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="PriceSale" class="form-label">Giá khuyến mãi</label>
                                    <input type="number" name="price_sale" class="form-control" id="PriceSale" value="{{$product->price_sale}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Color" class="form-label">Màu sắc</label>
                                    <input required type="text" name="color" class="form-control" id="Color" value="{{$product->color}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Quantity" class="form-label">Số lượng</label>
                                    <input required type="number" name="quantity" class="form-control" id="Quantity" value="{{$product->quantity}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Category" class="form-label">Danh mục</label>
                                    <select name="category_id" class="form-select" id="Category">
                                        @foreach ($categories as $item)
                                            <option @if ($product->category_id === $item->id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Category" class="form-label">Brand</label>
                                    <select name="brand_id" class="form-select" id="Category">
                                        @foreach ($brands as $item)
                                            <option @if ($product->brand_id === $item->id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Image" class="form-label">Hình ảnh</label><br>
                                    <img class="img-fluid" style="width: 10%" src="{{asset('/')}}img/product_img/{{$product->image}}" alt="">
                                    <input name="image" type="file" class="form-control mt-2" id="Image">
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
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

