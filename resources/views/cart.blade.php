@extends('layout')
@section('title', 'Giỏ Hàng')
@section('content')
    
    <div class="container-fluid" style="height: 50px;"></div>    
    @if(sizeof($products) > 0)
    <div class="container py-5">
        <section>
            <h3 class="text-center">Giỏ Hàng</h3>
        </section>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th class="fs-5" scope="col">Sản phẩm</th>
                    <th class="fs-5" scope="col"></th>
                    <th class="fs-5" scope="col">Giá</th>
                    <th class="fs-5" scope="col">Số lượng</th>
                    <th class="fs-5" scope="col">Tổng</th>
                    <th class="fs-5" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($products as $product)
                    @php
                        $price = Session::get('cart')[$product->id] * (($product->price_sale == 0)?$product->price:$product->price_sale);
                        $total += $price;
                    @endphp
                    <tr>
                        <td class="fs-5 align-middle"><img class="img-fluid" src="img/product_img/{{ $product->image }}" width="100" alt=""></td>
                        <td class="fs-5 align-middle">{{ $product->name }}</td>
                        <td class="fs-5 align-middle">
                            @if ($product->price_sale > 0)
                                {{ number_format($product->price_sale) }} đ
                            @else
                                {{ number_format($product->price) }} đ
                            @endif
                        </td>
                        <td class="fs-5 align-middle">
                            <input class="form-control" style="width: 70px;" type="number" value="{{Session::get('cart')[$product->id]}}" min="1">
                        </td>
                        <td class="fs-5 align-middle">{{ number_format(Session::get('cart')[$product->id] * (($product->price_sale == 0)?$product->price:$product->price_sale)) }} đ</td>
                        <td class="fs-5 align-middle"><a href="{{route('deletecart', $product->id)}}"><button type="button" class="btn-close" aria-label="Close"></button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-cart row p-5">
            <h2 class="col-md-4 fw-bold">THANH TOÁN</h2>
            <div class="col-md-8">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="fs-5">TỔNG ĐƠN HÀNG</th>
                            <td class="fs-5">{{number_format($total)}} đ</td>
                        </tr>
                    </tbody>
                </table>
                <button ng-click="checkUser()" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-dark btn-paying mt-4 d-flex justify-content-center align-items-center fs-4 w-100">TIẾN HÀNH THANH TOÁN</button>
            </div>
        </div>
    </div>
    @else
    <div class="container py-5 d-flex align-items-center justify-content-center" style="height: 770px">
        <div class="text-center">
            <i class="bi bi-emoji-frown" style="font-size: 100px"></i>
            <h4>Không có sản phẩm nào trong giỏ hàng!</h4>
            <a class="btn btn-outline-primary mt-2" href="{{route('products')}}">Tiếp tục mua hàng</a>
        </div>
    </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin giao hàng</h1>
            <button type="button" class="btn-close btn-out" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" name="user_name" value="{{Auth::check()?Auth::user()->name:''}}" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="user_email" value="{{Auth::check()?Auth::user()->email:''}}" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="user_phone" value="{{Auth::check()?Auth::user()->phone:''}}" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" name="user_address" value="{{Auth::check()?Auth::user()->address:''}}" class="form-control" id="address" value="" required>
                </div>

                <button type="submit" class="btn btn-success float-end">Xác nhận</button>
                <button type="button" class="btn btn-secondary btn-out float-end me-2" data-bs-dismiss="modal">Kiểm tra lại</button>
            </form>
            </div>
        </div>
        </div>
    </div>

@endsection