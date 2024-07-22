@extends('layout')
@section('title', 'Trang Chủ')
@section('content')

    <div class="bg-white" style="width: 100%; height: 62px;"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2600">
                <img src="img/banner/banner-dynamic.jpg" class="d-block w-100" style="max-height: 600px" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2600">
                <img src="img/banner/banner-blackrd.jpg" class="d-block w-100" style="max-height: 600px" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2600">
                <img src="img/banner/banner-jd.png" class="d-block w-100" style="max-height: 600px" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row category-list mx-auto mt-5 px-5">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="category-item rounded-4  mb-3 ct-item2">
                <div class="position-relative">
                    <img class="img-fluid rounded-4 ct-img hover" src="img/ct/{{$category->image}}" alt="">
                    <div class="ct-item-if text-center position-absolute top-50 start-50 translate-middle">
                        <h4 href="" class="fw-bold ct-name">{{$category->name}}</h4>
                        <a class="btn btn-ct" href="{{ route('category', $category->id) }}">XEM NGAY</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-md-4">
            <div class="category-item rounded-4  mb-3 ct-item2">
                <div class="position-relative">
                    <img class="img-fluid rounded-4" src="img/ct/ct2.jpg" alt="">
                    <div class="ct-item-if text-center position-absolute top-50 start-50 translate-middle">
                        <h4 href="" class="fw-bold">GIÀY NAM</h4>
                        <a class="btn btn-ct" href="#">XEM NGAY</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-item rounded-4  mb-3 ct-item2">
                <div class="position-relative">
                    <img class="img-fluid rounded-4" src="img/ct/ct3.jpg" alt="">
                    <div class="ct-item-if text-center position-absolute top-50 start-50 translate-middle">
                        <h4 href="" class="fw-bold">GIÀY NỮ</h4>
                        <a class="btn btn-ct" href="#">XEM NGAY</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-item rounded-4  mb-3 ct-item2">
                <div class="position-relative">
                    <img class="img-fluid rounded-4" src="img/ct/ct1.jpg" alt="">
                    <div class="ct-item-if text-center position-absolute top-50 start-50 translate-middle">
                        <h4 href="" class="fw-bold">GIÀY ĐÔI</h4>
                        <a class="btn btn-ct" href="#">XEM NGAY</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="container-fluid px-5 mx-auto row product-list">
        <section class="col-12 d-flex mt-5 mb-4">
            <div class="d-flex mx-auto">
                <h2 class="fw-bold text-black">SẢN PHẨM&nbsp;</h2><h2 class="fw-bold text-red">MỚI NHẬP</h2>
            </div>
        </section>

        @foreach ($new as $product)
        <div class="col-md-3 mt-5">
            <div class="card border-0 shadow">
                <div class="position-relative">
                    <img src="img/product_img/{{$product->image}}" class="card-img-top" alt="...">
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
                <h5 class="card-title text-center fw-bold text-black">{{$product->name}}</h5>
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
        
        <section class="col-12 d-flex mt-5 mb-4">
            <div class="d-flex mx-auto">
                <h2 class="fw-bold text-black">SẢN PHẨM&nbsp;</h2><h2 class="fw-bold text-red">BÁN CHẠY</h2>
            </div>
        </section>
        @foreach ($bestseller as $product)
        <div class="col-md-3 mt-5">
            <div class="card border-0 shadow">
                <div class="position-relative">
                    <img src="img/product_img/{{$product->image}}" class="card-img-top" alt="...">
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
                    <h5 class="card-title text-center fw-bold text-black">{{$product->name}}</h5>
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


        <section class="col-12 d-flex mt-5 mb-4">
            <div class="d-flex mx-auto">
                <h2 class="fw-bold text-black">SẢN PHẨM&nbsp;</h2><h2 class="fw-bold text-red">KHUYẾN MÃI</h2>
            </div>
        </section>
        @foreach ($sale as $product)
        <div class="col-md-3 mt-5">
            <div class="card border-0 shadow">
                <div class="position-relative">
                    <img src="img/product_img/{{$product->image}}" class="card-img-top" alt="...">
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
                    <h5 class="card-title text-center fw-bold text-black">{{$product->name}}</h5>
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
        

    </div>
    <div class="container-fluid px-5 row mx-auto my-5">
        <div class="col-md-4 text-center border py-3">
            <i class="bi bi-award fs-2"></i><br>
            <span>Hàng chính hãng, chất lượng cao</span>
        </div>
        <div class="col-md-4 text-center border py-3">
            <i class="bi bi-coin fs-2"></i><br>
            <span>Miễn phí vận chuyển</span>
        </div>
        <div class="col-md-4 text-center border py-3">
            <i class="bi bi-arrow-left-right fs-2"></i><br>
            <span>Đổi hàng 30 ngày thủ tục đơn giản</span>
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
