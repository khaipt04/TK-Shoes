@extends('layout')
@section('title', 'Liên Hệ')
@section('content')
    <div class="container-fluid" style="height: 50px;"></div>   
    <div class="container">
        <div class="container py-5 my-5">
            <h3>Liên hệ</h3>
            <div class="row g-5">
                <div class="col-xl-6">
                    <div class="row row-cols-md-2 g-4">
                    <div class="aos-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="aos-item__inner">
                        <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                            <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-envelope h3 pe-2"></i>
                            <span class="h5">Email</span>
                            </div>
                            <span>tkshoes@gmail.com</span>
                        </div>
                        </div>
                    </div>
                    <div class="aos-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="aos-item__inner">
                        <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                            <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-phone h3 pe-2"></i>
                            <span class="h5">Số điện thoại</span>
                            </div>
                            <span>+0987654321</span>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="aos-item mt-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="aos-item__inner">
                        <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                        <div class="d-flex justify-content-start">
                            <i class="fa-solid fa-location-pin h3 pe-2"></i>
                            <span class="h5">Vị trí cửa hàng</span>
                        </div>
                        <span>QTSC, To ky, Quan 12, TP.HCM</span>
                        </div>
                    </div>
                    </div>
                    <div class="aos-item" data-aos="fade-up" data-aos-delay="800">
                    <div class="mt-4 w-100 aos-item__inner">
                        <iframe class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4544374621864!2d106.62420897530995!3d10.852999257776094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1718084703199!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    </div>
                </div>
        
                <div class="col-xl-6">
                    <h2 class="pb-4">Để lại lời nhắn cho chúng tôi</h2>
                    <div class="row g-4">
                    <div class="col-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Họ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                    <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Quốc gia</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected value="1">Việt Nam</option>
                        <option value="2">USA</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Lời nhắn</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-dark">Gửi</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
