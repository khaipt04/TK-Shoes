@extends('layout')
@section('title', 'Đơn Hàng')
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
                    <h5 class="mb-4">Đơn Hàng</h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="1-tab" data-bs-toggle="tab" data-bs-target="#1-tab-pane" type="button" role="tab" aria-controls="1-tab-pane" aria-selected="true">Đang chờ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="2-tab" data-bs-toggle="tab" data-bs-target="#2-tab-pane" type="button" role="tab" aria-controls="2-tab-pane" aria-selected="false">Đang giao</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="3-tab" data-bs-toggle="tab" data-bs-target="#3-tab-pane" type="button" role="tab" aria-controls="3-tab-pane" aria-selected="false">Đã giao</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="4-tab" data-bs-toggle="tab" data-bs-target="#4-tab-pane" type="button" role="tab" aria-controls="4-tab-pane" aria-selected="false">Đã hủy</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- tab dang cho -->
                        <div class="tab-pane fade show active" id="1-tab-pane" role="tabpanel" aria-labelledby="1-tab" tabindex="0">
                            <div class="bg-white p-4">
                                @if ($orders_pending->isEmpty())
                                    <h5 class="text-center">Không có đơn nào đang chờ!</h5>
                                @endif
                                @foreach ($orders_pending as $order)
                                <div class="bg-light rounded border mb-4 p-4">
                                    <section class="d-flex justify-content-between">
                                        <h6 class="fw-bold m-0 p-0">TK Shoes - Chi tiết đơn hàng</h6>
                                        <div class="d-flex"><h6 class="fw-bold m-0 p-0 me-2">Trạng thái: <h6 class="text-warning m-0 p-0">{{$order->status}}</h6></h6></div>
                                    </section>
                                    <hr>
                                    @foreach ($order->orderDetails as $detail)
                                    <div class="product_order">
                                        <div class="d-flex">
                                            <img src="{{asset('/')}}img/product_img/{{ $detail->product->image }}" width="100" alt="" srcset="">
                                            <div class="ms-4">
                                                <h5>{{ $detail->product->name }}</h5>
                                                <p>Số lượng: {{ $detail->quantity }}</p>
                                            </div>
                                            <p class="d-flex m-0 ms-auto align-items-center">Tổng cộng: {{number_format($detail->quantity * $detail->price)}} đ</p>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                    <div class="text-end">
                                        <div class="d-flex justify-content-between">
                                          <p>Ngày đặt hàng: {{$order->created_at->format('H:i d/m/Y')}}</p>
                                          <div class="d-flex">
                                            <p class="me-2">Tổng đơn hàng: <h5 class="text-red">{{number_format($order->total_money)}} đ</h5></p>
                                          </div>
                                        </div>
                                        <form action="{{route('ordercancle')}}" method="post">
                                            @csrf
                                            <input hidden name="order_id" type="text" value="{{$order->id}}">
                                            <button class="btn btn-danger">Hủy đơn</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- tab dang giao -->
                        <div class="tab-pane fade" id="2-tab-pane" role="tabpanel" aria-labelledby="2-tab" tabindex="0">
                            <div class="bg-white p-4">
                                @if ($orders_shipping->isEmpty())
                                    <h5 class="text-center">Không có đơn nào đang giao!</h5>
                                @endif
                                @foreach ($orders_shipping as $order)
                                <div class="bg-light rounded border mb-4 p-4">
                                    <section class="d-flex justify-content-between">
                                        <h6 class="fw-bold m-0 p-0">TK Shoes - Chi tiết đơn hàng</h6>
                                        <div class="d-flex"><h6 class="fw-bold m-0 p-0 me-2">Trạng thái: <h6 class="text-primary m-0 p-0">{{$order->status}}</h6></h6></div>
                                    </section>
                                    <hr>
                                    @foreach ($order->orderDetails as $detail)
                                    <div class="product_order">
                                        <div class="d-flex">
                                            <img src="{{asset('/')}}img/product_img/{{ $detail->product->image }}" width="100" alt="" srcset="">
                                            <div class="ms-4">
                                                <h5>{{ $detail->product->name }}</h5>
                                                <p>Số lượng: {{ $detail->quantity }}</p>
                                            </div>
                                            <p class="d-flex m-0 ms-auto align-items-center">Tổng cộng: {{number_format($detail->quantity * $detail->price)}} đ</p>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                    <div class="text-end">
                                        <div class="d-flex justify-content-between">
                                          <p>Ngày đặt hàng: {{$order->created_at->format('H:i d/m/Y')}}</p>
                                          <div class="d-flex">
                                            <p class="me-2">Tổng đơn hàng: <h5 class="text-red">{{number_format($order->total_money)}} đ</h5></p>
                                          </div>
                                        </div>
                                        <button class="btn btn-danger">Hủy đơn</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- tab da giao -->
                        <div class="tab-pane fade" id="3-tab-pane" role="tabpanel" aria-labelledby="3-tab" tabindex="0">
                            <div class="bg-white p-4">
                                @if ($orders_success->isEmpty())
                                    <h5 class="text-center">Không có đơn nào đã giao!</h5>
                                @endif
                                @foreach ($orders_success as $order)
                                <div class="bg-light rounded border mb-4 p-4">
                                    <section class="d-flex justify-content-between">
                                        <h6 class="fw-bold m-0 p-0">TK Shoes - Chi tiết đơn hàng</h6>
                                        <div class="d-flex"><h6 class="fw-bold m-0 p-0 me-2">Trạng thái: <h6 class="text-success m-0 p-0">{{$order->status}}</h6></h6></div>
                                    </section>
                                    <hr>
                                    @foreach ($order->orderDetails as $detail)
                                    <div class="product_order">
                                        <div class="d-flex">
                                            <img src="{{asset('/')}}img/product_img/{{ $detail->product->image }}" width="100" alt="" srcset="">
                                            <div class="ms-4">
                                                <h5>{{ $detail->product->name }}</h5>
                                                <p>Số lượng: {{ $detail->quantity }}</p>
                                            </div>
                                            <p class="d-flex m-0 ms-auto align-items-center">Tổng cộng: {{number_format($detail->quantity * $detail->price)}} đ</p>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                    <div class="text-end">
                                        <div class="d-flex justify-content-between">
                                          <p>Ngày đặt hàng: {{$order->created_at->format('H:i d/m/Y')}}</p>
                                          <div class="d-flex">
                                            <p class="me-2">Tổng đơn hàng: <h5 class="text-red">{{number_format($order->total_money)}} đ</h5></p>
                                          </div>
                                        </div>
                                        <button class="btn btn-success">Mua lại</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- tab da huy -->
                        <div class="tab-pane fade" id="4-tab-pane" role="tabpanel" aria-labelledby="4-tab" tabindex="0">
                            <div class="bg-white p-4">
                                @if ($orders_cancle->isEmpty())
                                    <h5 class="text-center">Không có đơn nào đã hủy!</h5>
                                @endif
                                @foreach ($orders_cancle as $order)
                                <div class="bg-light rounded border mb-4 p-4">
                                    <section class="d-flex justify-content-between">
                                        <h6 class="fw-bold m-0 p-0">TK Shoes - Chi tiết đơn hàng</h6>
                                        <div class="d-flex"><h6 class="fw-bold m-0 p-0 me-2">Trạng thái: <h6 class="text-danger m-0 p-0">{{$order->status}}</h6></h6></div>
                                    </section>
                                    <hr>
                                    @foreach ($order->orderDetails as $detail)
                                    <div class="product_order">
                                        <div class="d-flex">
                                            <img src="{{asset('/')}}img/product_img/{{ $detail->product->image }}" width="100" alt="" srcset="">
                                            <div class="ms-4">
                                                <h5>{{ $detail->product->name }}</h5>
                                                <p>Số lượng: {{ $detail->quantity }}</p>
                                            </div>
                                            <p class="d-flex m-0 ms-auto align-items-center">Tổng cộng: {{number_format($detail->quantity * $detail->price)}} đ</p>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                    <div class="text-end">
                                        <div class="d-flex justify-content-between">
                                          <p>Ngày đặt hàng: {{$order->created_at->format('H:i d/m/Y')}}</p>
                                          <div class="d-flex">
                                            <p class="me-2">Tổng đơn hàng: <h5 class="text-red">{{number_format($order->total_money)}} đ</h5></p>
                                          </div>
                                        </div>
                                        <button class="btn btn-success">Mua lại</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
