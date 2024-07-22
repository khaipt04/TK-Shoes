@extends('admin.layout')
@section('title', 'Quản Lí Đơn Hàng')
@section('content')

<main class="content px-3 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">QUẢN LÍ ĐƠN HÀNG</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 p-5 mt-4">
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
                                <table class="table table-delivery">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Đơn hàng</th>
                                            <th scope="col">Tổng đơn hàng</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders_pending as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                @foreach ($order->orderDetails as $detail)
                                                <div class="d-flex align-items-center my-2">
                                                    <img width="70px" class="img-fluid" src="{{asset('/')}}img/product_img/{{ $detail->product->image}}" alt="">
                                                    <div>
                                                        <p class="m-0 ms-2">{{ $detail->product->name }}</p>
                                                        <small class="m-0 ms-2">Số lượng: {{$detail->quantity}}</small>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </td>                                       
                                            <td>{{number_format($order->total_money)}} đ</td>
                                            <td>
                                                <a href="{{route('orderdetail', $order->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                                            <td class="text-warning">{{$order->status}}</td>
                                            <td>
                                                <form action="{{route('orderaccept')}}" method="post">
                                                    @csrf
                                                    <input hidden name="order_id" type="text" value="{{$order->id}}">
                                                    <button type="submit" class="btn btn-primary w-100" href="">Xác Nhận</button><br>
                                                </form>
                                                <form action="{{route('ordercancle')}}" method="post">
                                                    @csrf
                                                    <input hidden name="order_id" type="text" value="{{$order->id}}">
                                                    <button type="submit" class="btn btn-danger mt-1 w-100" href="">Hủy</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- tab dang giao -->
                            <div class="tab-pane fade" id="2-tab-pane" role="tabpanel" aria-labelledby="2-tab" tabindex="0">
                                <table class="table table-delivery">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Đơn hàng</th>
                                            <th scope="col">Tổng đơn hàng</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders_shipping as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                @foreach ($order->orderDetails as $detail)
                                                <div class="d-flex align-items-center my-2">
                                                    <img width="70px" class="img-fluid" src="{{asset('/')}}img/product_img/{{ $detail->product->image}}" alt="">
                                                    <div>
                                                        <p class="m-0 ms-2">{{ $detail->product->name }}</p>
                                                        <small class="m-0 ms-2">Số lượng: {{$detail->quantity}}</small>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </td>                                       
                                            <td>{{number_format($order->total_money)}} đ</td>
                                            <td>
                                                <a href="{{route('orderdetail', $order->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                                            <td class="text-primary">{{$order->status}}</td>
                                            <td>
                                                <form action="{{route('ordersuccess')}}" method="post">
                                                    @csrf
                                                    <input hidden name="order_id" type="text" value="{{$order->id}}">
                                                    <button type="submit" class="btn btn-success w-100">Đã Giao Hàng</button><br>
                                                </form>
                                                <form action="{{route('ordercancle')}}" method="post">
                                                    @csrf
                                                    <input hidden name="order_id" type="text" value="{{$order->id}}">
                                                    <button type="submit" class="btn btn-danger mt-1 w-100">Hủy</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- tab da giao -->
                            <div class="tab-pane fade" id="3-tab-pane" role="tabpanel" aria-labelledby="3-tab" tabindex="0">
                                <table class="table table-delivery">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Đơn hàng</th>
                                            <th scope="col">Tổng đơn hàng</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders_success as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                @foreach ($order->orderDetails as $detail)
                                                <div class="d-flex align-items-center my-2">
                                                    <img width="70px" class="img-fluid" src="{{asset('/')}}img/product_img/{{ $detail->product->image}}" alt="">
                                                    <div>
                                                        <p class="m-0 ms-2">{{ $detail->product->name }}</p>
                                                        <small class="m-0 ms-2">Số lượng: {{$detail->quantity}}</small>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </td>                                       
                                            <td>{{number_format($order->total_money)}} đ</td>
                                            <td>
                                                <a href="{{route('orderdetail', $order->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                                            <td class="text-success">{{$order->status}}</td>
                                            <td>
                                                <button class="btn btn-primary w-100">Xem đánh giá</button><br>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                             <!-- tab da huy -->
                             <div class="tab-pane fade" id="4-tab-pane" role="tabpanel" aria-labelledby="4-tab" tabindex="0">
                                <table class="table table-delivery">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Đơn hàng</th>
                                            <th scope="col">Tổng đơn hàng</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                            <th scope="col">Đã hủy lúc</th>
                                            <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders_cancle as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>
                                                @foreach ($order->orderDetails as $detail)
                                                <div class="d-flex align-items-center my-2">
                                                    <img width="70px" class="img-fluid" src="{{asset('/')}}img/product_img/{{ $detail->product->image}}" alt="">
                                                    <div>
                                                        <p class="m-0 ms-2">{{ $detail->product->name }}</p>
                                                        <small class="m-0 ms-2">Số lượng: {{$detail->quantity}}</small>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </td>                                       
                                            <td>{{number_format($order->total_money)}} đ</td>
                                            <td>
                                                <a href="{{route('orderdetail', $order->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                                            <td>{{$order->updated_at->format('H:i d/m/Y')}}</td>
                                            <td class="text-danger">{{$order->status}}</td>
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
    </div>
</main>
</div>
</div>
</div>

@endsection