@extends('admin.layout')
@section('title', 'Chi Tiết Đơn Hàng')
@section('content')
<main class="content px-3 py-4">
    <?php
        $statusClass = '';
        if ($order->status == 'Đang chờ') {
            $statusClass = 'text-warning';
        } elseif ($order->status == 'Đang giao hàng') {
            $statusClass = 'text-primary';
        } elseif ($order->status == 'Giao hàng thành công') {
            $statusClass = 'text-success';
        } else {
            $statusClass = 'text-danger';
        }
    ?>
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">CHI TIẾT ĐƠN HÀNG</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 p-5 mt-4">
                        <a style="width: 100px;" class="btn btn-outline-primary ms-3" href="{{route('admin_order')}}">Quay lại</a>
                        <div class="card-body row mt-3  ">
                            <div class="col-md-3">
                                <h4 class="mb-5 fw-bold">Mã đơn hàng: #{{$order->id}}</h4>
                                <div>
                                    <label class="fw-bold fs-5">Họ và tên:</label>
                                    <p>{{$order->user_name}}</p>
                                </div>
                                <div>
                                    <label class="fw-bold fs-5">Email:</label>
                                    <p>{{$order->user_email}}</p>
                                </div>
                                <div>
                                    <label class="fw-bold fs-5">Số điện thoại:</label>
                                    <p>{{$order->user_phone}}</p>
                                </div>
                                <div>
                                    <label class="fw-bold fs-5">Địa chỉ giao hàng:</label>
                                    <p>{{$order->user_address}}</p>
                                </div>
                                <div>
                                    <label class="fw-bold fs-5">Ngày đặt hàng:</label>
                                    <p>{{$order->created_at->format('H:i d/m/Y')}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-5 fw-bold">Sản phẩm</h4>
                                @foreach ($order->orderDetails as $detail)
                                <div class="d-flex align-items-center justify-content-between my-2 p-2 border rounded">
                                    <div class="d-flex align-items-center">
                                        <img width="70px" class="img-fluid" src="{{asset('/')}}img/product_img/{{$detail->product->image}}" alt="">
                                        <div>
                                            <p class="m-0 ms-2 fw-bold">{{$detail->product->name}}</p>
                                            <small class="m-0 ms-2">Số lượng: {{$detail->quantity}}</small>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="m-0">Tổng: {{number_format($detail->quantity * $detail->price)}} đ</p>
                                    </div>
                                </div>
                                @endforeach
                                <small>Tổng sản phẩm: {{$order->total_quantity}}</small>
                            </div>
                            <div class="col-md-3">
                                <h4 class="mb-5 fw-bold">Tổng đơn hàng</h4>
                                <h3>{{number_format($order->total_money)}} đ</h3>
                                <div class="mt-5">
                                    <h4 class="fw-bold">Trạng thái: </h4><h4 class="m-0 {{ $statusClass }}">{{$order->status}}</h4>
                                </div>
                                <div class="mt-5">
                                    @if ($order->status == 'Đang chờ' || $order->status == 'Đang giao hàng')
                                        @if ($order->status == 'Đang chờ')
                                        <form action="{{route('orderaccept')}}" method="post">
                                            @csrf
                                            <input hidden name="order_id" type="text" value="{{$order->id}}">
                                            <button type="submit" class="btn btn-primary w-100" href="">Xác Nhận</button><br>
                                        </form>
                                        @else
                                        <form action="{{route('ordersuccess')}}" method="post">
                                            @csrf
                                            <input hidden name="order_id" type="text" value="{{$order->id}}">
                                            <button type="submit" class="btn btn-success w-100" href="">Đã Giao Hàng</button><br>
                                        </form>
                                        @endif
                                        <form action="{{route('ordercancle')}}" method="post">
                                            @csrf
                                            <input hidden name="order_id" type="text" value="{{$order->id}}">
                                            <button type="submit" class="btn btn-danger mt-1 w-100" href="">Hủy</button>
                                        </form>
                                    @elseif($order->status == 'Giao hàng thành công')
                                        <form>
                                            @csrf
                                            <input hidden name="order_id" type="text" value="">
                                            <button class="btn btn-primary mt-1 w-100" href="">Xem đánh giá</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</main>
@endsection

