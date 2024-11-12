<footer class="mt-5 container-fluid bg-gray" >
    <div class="container">
        @if($thongTin && $thongTin->count()) <!-- Kiểm tra xem $thongTin có tồn tại và không rỗng -->
            @foreach($thongTin as $tt)
                @if($tt && isset($tt->logo))  <!-- Kiểm tra từng đối tượng $tt và thuộc tính logo -->
                    <div class="row p-4">
                        <div class="col-4">
                            <a class="" href="{{ route('home') }}">
                                <img src="{{asset('storage/' . $tt->logo)}}" width="135" height="40" alt="Logo">
                            </a>
                            <p class="mt-3 text-muted">
                                Công ty chúng tôi cung cấp sản phẩm chất lượng cao với giá cả hợp lý, mang lại sự hài lòng cho khách hàng.
                            </p>
                            <div class="social-icons mt-2">
                                <a href="https://facebook.com" target="_blank" class="me-2 text-muted"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://instagram.com" target="_blank" class="me-2 text-muted"><i class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com" target="_blank" class="me-2 text-muted"><i class="fab fa-twitter"></i></a>
                                <a href="https://linkedin.com" target="_blank" class="text-muted"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <h3 class="text-center">Liên kết hữu ích</h3>
                            <div class="row">
                                <div class="col-6 ">

                                    <ul class="list-unstyled text-decoration-none">
                                        <li><a href="#">Về chúng tôi</a></li>
                                        <li><a href="#">Về cửa hàng của chúng tôi</a></li>
                                        <li><a href="#">Mua sắm an toàn</a></li>
                                        <li><a href="#">Thông tin giao hàng</a></li>
                                        <li><a href="#">Chính sách bảo mật</a></li>
                                    </ul>

                                </div>
                                <div class="col-6 ">

                                    <ul class="list-unstyled ">
                                        <li><a href="#">Chúng tôi là ai</a></li>
                                        <li><a href="#">Dịch vụ của chúng tôi</a></li>
                                        <li><a href="#">Dự án</a></li>
                                        <li><a href="#">Liên hệ chúng tôi</a></li>
                                        <li><a href="#">Sơ đồ trang web</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <h3 class="text-center">Địa chỉ cửa hàng</h3>
                            <div>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="info-item">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span>{{ $tt->address }}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="fa-solid fa-phone"></i>
                                            <span>Phone: {{ $tt->phone_number }} </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="fa-regular fa-envelope"></i>
                                            <span>Email:  {{ $tt->email }} </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="info-item">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>Hours: từ 8h - 21h hàng ngày
                                            </span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>Không có thông tin để hiển thị.</p>  <!-- Thông báo khi $thongTin không có dữ liệu -->
        @endif
    </div>
    <div class="text-center">
        Copyright @tuyenpvph38503 2024
    </div>
</footer>
