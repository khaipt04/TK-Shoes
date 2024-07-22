@extends('admin.layout')
@section('title', 'Tổng Quan')
@section('content')
    
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h3 class="fw-bold fs-4 mb-3">TỔNG QUAN</h3>
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="card border-0 px-5 py-3 mb-2">
                                <div class="card-body row py-4">
                                    <div class="col-md-6">
                                        <h2 class="fw-bold my-auto m-0 mb-2">715</h2>
                                        <p class="my-auto m-0 mt-2">Sản Phẩm</p>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" style="height: 68px;" src="{{ asset('img/ic/gift-solid.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card border-0 px-5 py-3 mb-2">
                                <div class="card-body row py-4">
                                    <div class="col-md-6">
                                        <h2 class="fw-bold my-auto m-0 mb-2">2145</h2>
                                        <p class="my-auto m-0 mt-2">Đơn hàng</p>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" style="height: 68px;" src="{{ asset('img/ic/truck-solid.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card border-0 px-5 py-3 mb-2">
                                <div class="card-body row py-4">
                                    <div class="col-md-6">
                                        <h2 class="fw-bold my-auto m-0 mb-2">10000</h2>
                                        <p class="my-auto m-0 mt-2">Người dùng</p>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" style="height: 68px;" src="{{ asset('img/ic/user-solid.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </main>
    </div>

@endsection