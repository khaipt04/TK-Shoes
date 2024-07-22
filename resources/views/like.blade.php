@extends('layout')
@section('title', 'Sản Phẩm Yêu Thích')
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
                    <h5 class="mb-4">Sản Phẩm Yêu Thích</h5>
                    @foreach ($products as $item)
                    <div class="bg-white p-3 mt-4 rounded d-flex justify-content-between">
                        <div class="d-flex">
                            <img class="rounded" src="{{asset('/')}}img/product_img/{{$item->image}}" style="width: 100px" alt="">
                            <div class="ms-2">
                                <a href="{{ route('productdetail', $item->id) }}" class="fs-5 text-decoration-none text-black">{{$item->name}}</a>
                                @if (isset($item->price_sale))
                                    <p class="text-red fs-5 p-0 m-0">{{ number_format($item->price_sale,0,'.',',' ) }} đ</p>
                                    <del>{{ number_format($item->price,0,'.',',' ) }} đ</del>
                                @else
                                    <p class="text-red fs-5 p-0 m-0">{{ number_format($item->price,0,'.',',' ) }} đ</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <form action="{{route('like')}}" method="post">
                                @csrf
                                <div class="text-end">
                                    <input hidden type="number" name="product_id" value="{{ $item->id }}">
                                    <button type="submit" class="fs-3 bi bi-heart-fill text-danger btn p-0"></button>
                                </div>
                            </form>

                            <form action="{{route('addtocart')}}" method="post">
                                @csrf
                                <div class="bottom-0 mt-4">
                                    <input hidden type="number" name="product_id" value="{{ $item->id }}">
                                    <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                    @endforeach
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
