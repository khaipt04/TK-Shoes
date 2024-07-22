@extends('layout')
@section('title', 'Sản Phẩm')
@section('content')

    <div class="container-fluid" style="height: 50px;"></div>   
    <div class="card text-bg-dark border-0 rounded-0">
        <img src="{{asset('/')}}img/banner/banner-dynamic.jpg" class="card-img-object-fit-cover rounded-0" style="max-height: 350px;" alt="...">
        <div class="card-img-overlay d-flex justify-content-center align-items-center bg-dark bg-opacity-25">
            <div class="text-center">
                <h1 class="card-text fw-bold">DANH MỤC SẢN PHẨM</h1>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 list-ct bg-white">
                <h5 class="fw-bold">Danh mục sản phẩm</h5>
                <ul class="list-group rounded-0 bg-white mt-5">
                    <li class="list-group-item border-0 bg-white p-0 mb-3 fs-6"><a class="text-decoration-none text-secondary" href="{{ route('products') }}">Tất cả sản phẩm</a></li>
                    @foreach ($brands as $brand)
                        <li class="list-group-item border-0 bg-white p-0 mb-3 fs-6"><a class="text-decoration-none text-secondary" href="{{ route('brand', $brand->id) }}">{{$brand->name}}</a></li>
                    @endforeach
                    @foreach ($categories as $category)
                        <li class="list-group-item border-0 bg-white p-0 mb-3 fs-6"><a class="text-decoration-none text-secondary" href="{{ route('category', $category->id) }}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="container col-md-9">
                <select class="form-select float-end" style="max-width: 250px;" aria-label="Default select example ">
                    <option>Mặc định</option>
                    <option>Sắp xếp theo giá tăng dần</option>
                    <option>Sắp xếp theo giá giảm dần</option>
                    <option>Sắp xếp theo tên từ A-Z</option>
                    <option>Sắp xếp theo tên từ Z-A</option>
                </select>

                <div class="row mt-5 p-0 pt-4">
                    @foreach ($products as $product)
                    <div class="col-md-4 mt-2 mb-5">
                        <div class="card border-0 shadow">
                            <div class="position-relative">
                                <img src="{{asset('/')}}img/product_img/{{$product->image}}" class="card-img-top" alt="...">
                                <div class="btn-overlay">
                                    <form action="{{route('addtocart')}}" method="post">
                                        @csrf
                                        <input hidden type="number" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-outline-success"><i class="fs-4 bi bi-cart-dash"></i></button>
                                    </form>
                                    @if (Auth::check())
                                        <form action="{{route('like')}}" method="post">
                                            @csrf
                                            <input hidden type="number" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-outline-danger{{ $isLiked[$product->id] == true ? ' active' : '' }}"><i class="fs-4 bi bi-heart"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('productdetail', $product->id) }}" class="text-decoration-none">
                                <div class="card-body">
                                <h5 class="card-title text-center fw-bold text-dark">{{$product->name}}</h5>
                                <div class="d-flex align-items-center justify-content-center">
                                    @if (isset($product->price_sale))
                                        <p class="card-text text-center fw-bold text-red fs-5 m-0">{{ number_format($product->price_sale,0,'.',',' ) }} đ</p>
                                        <del class="ms-2 text-secondary">{{ number_format($product->price,0,'.',',' ) }} đ</del>
                                    @else
                                        <p class="card-text text-center fw-bold text-red fs-5 m-0">{{ number_format($product->price,0,'.',',' ) }} đ</p>
                                    @endif
                                </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $products->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@if (Session::has('message'))
        <div class="alert alert-box alert-success" role="alert">
            {{Session::get('message')}}
        </div>
        @php
            Session::forget('message');
        @endphp
@endif
