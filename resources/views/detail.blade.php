@extends('layout')
@section('title', 'Chi Tiết Sản Phẩn')
@section('content')
    
    @foreach ($product as $item)
        <div class="container-fluid" style="height: 50px;"></div>
        <div class="info-box-detail container-fluid row mt-5 px-5 mx-auto">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active" >
                            <img src="{{asset('/')}}img/product_img/{{$item->image}}" class="d-block w-100" alt="...">
                        </div>
                        @php
                            $image_ = substr($item->image, 0, -5);
                        @endphp
                        <div class="carousel-item">
                            <img src="{{ asset('/')}}img/product_img/{{$image_}}2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/')}}img/product_img/{{$image_}}3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/')}}img/product_img/{{$image_}}4.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/')}}img/product_img/{{$image_}}5.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center mt-3">
                    <img class="img-thumbnail p-0 rounded-0 mb-2" src="{{ asset('/')}}img/product_img/{{$image_}}1.jpg" width="80" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" alt="">
                    <img class="img-thumbnail p-0 rounded-0 mb-2" src="{{ asset('/')}}img/product_img/{{$image_}}2.jpg" width="80" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" alt="">
                    <img class="img-thumbnail p-0 rounded-0 mb-2" src="{{ asset('/')}}img/product_img/{{$image_}}3.jpg" width="80" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" alt="">
                    <img class="img-thumbnail p-0 rounded-0 mb-2" src="{{ asset('/')}}img/product_img/{{$image_}}4.jpg" width="80" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4" alt="">
                    <img class="img-thumbnail p-0 rounded-0 mb-2" src="{{ asset('/')}}img/product_img/{{$image_}}5.jpg" width="80" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5" alt="">
                </div>
            </div>
            
            <div class="col-md-6">
                <h3>{{$item->name}}</h3>
                <div class="mt-5">
                    @if (isset($item->price_sale))
                        <h4 class="text-danger">{{ number_format($item->price_sale,0,'.',',' ) }} đ</h4>
                        <del class="text-secondary">{{ number_format($item->price,0,'.',',' ) }} đ</del>
                    @else
                        <h4 class="text-danger">{{ number_format($item->price,0,'.',',' ) }} đ</h4>
                    @endif
                </div>
                
                @if (Auth::check())
                <form action="{{route('like')}}" method="POST">
                    @csrf
                    <input hidden type="number" name="product_id" value="{{ $item->id }}">
                    <button class="fs-2 p-0 btn mt-3 bi bi-heart{{$isLiked == true ? '-fill text-danger' : ''}}
                    " type="submit"></button>
                </form>
                @endif
                
                <h5 class="mt-3">Màu sắc: {{$item->color}}</h5>
                
                <form action="{{route('addtocart')}}" method="post">
                @csrf
                <div class="mt-4 w-25">
                    <label for="Quantity" class="form-label fs-5">Số lượng</label>
                    <input required type="number" name="quantity" class="form-control" id="Quantity" value="1" min="1" max="{{$item->quantity}}">
                </div>

                <input hidden type="number" name="product_id" value="{{ $item->id }}">
                <button type="submit" class="btn btn-buy btn-dark fs-4 w-100 mt-4">THÊM VÀO GIỎ HÀNG</button>
                </form>
            </div>

            <div class="col-12" style="height: 70px;"></div>

            <div class="row mt-5 p-0">
                <div class="col-md-6 row mb-5 align-items-center">
                    <i class="bi bi-check-circle col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Chất lượng sản phẩm?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Sản phẩm luôn được kiểm định, đánh giá với chất lượng cao nhất trước khi đến tay khách hàng!</p>
                    </div> 
                </div>
                <div class="col-md-6 ms-4 mb-5 row align-items-center">
                    <i class="bi bi-hourglass-split col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Thời gian giao hàng?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Chúng tôi sử dụng đơn vi vận chuyển uy tín và nhanh chóng nhất, thời dự kiến từ 1-4 ngày tuy khu vực.</p>
                    </div> 
                </div>
                <div class="col-md-6 row mb-5 align-items-center">
                    <i class="bi bi-palette col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Sai màu sản phẩm?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Vì 1 số yếu tố khách quan như độ sáng màn hình, chất lượng màn hình nên sản phẩm có thể ko đúng màu.</p>
                    </div> 
                </div>
                <div class="col-md-6 ms-4 mb-5 row align-items-center">
                    <i class="bi bi-clock col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Thời gian làm việc?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Hệ thống cửa hàng và Online làm việc từ 8:30 - 22:00 hàng ngày.</p>
                    </div> 
                </div>
                <div class="col-md-6 row mb-5 align-items-center">
                    <i class="bi bi-backpack col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Hàng có sẵn không?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Sản phẩm hiện có sẵn tại hệ thống cửa hàng và online tại website.</p>
                    </div> 
                </div>
                <div class="col-md-6 ms-4 mb-5 row align-items-center">
                    <i class="bi bi-arrow-repeat col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Đổi hàng như thế nào?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Việc đổi hàng rất dễ dàng và chúng tôi luôn muốn khách hàng ưng ý nhất. Hãy liên hệ fanpage để đổi!</p>
                    </div> 
                </div>
                <div class="col-md-6 row mb-5 align-items-center">
                    <i class="bi bi-hand-thumbs-up col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Bảo hành sản phẩm</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Sản phẩm được bảo hành trong 30 ngày với bất kỳ lỗi nào. Hàng SALE không được bảo hành.</p>
                    </div> 
                </div>
                <div class="col-md-6 ms-4 mb-5 row align-items-center">
                    <i class="bi bi-arrows-angle-contract col-2" style="font-size: 60px;"></i>
                    <div class="col-10">
                        <h5 class="m-0">Chọn sai size giày?</h5>
                        <p class="m-0 mt-2" style="font-size: 14px;">Bạn có thể qua cửa hàng hoặc gửi lại để đổi hàng với sản phẩm mới 100%. Còn nguyên tem mác, hoá đơn mua hàng.</p>
                    </div> 
                </div>
                <hr>
            </div>

            <div class="row mt-5 p-0">
                <section class="col-12 text-center mb-5">
                    <h4>Sản Phẩm Liên Quan</h4>
                </section>
                <div class="col-md-2 mt-2 mb-5">
                    <a href="" class="text-decoration-none">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('img/product_img/lvtx1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h6 class="card-title text-center fw-bold">Giày 1</h6>
                            <p class="card-text text-center fw-bold text-red fs-7">9999999 đ</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    @if (Session::has('message'))
        <div class="alert alert-box alert-success" role="alert">
            {{Session::get('message')}}
        </div>
        @php
            Session::forget('message');
        @endphp
    @endif
@endsection