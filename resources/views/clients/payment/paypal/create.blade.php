@extends('layouts.client')

@section('css')

@endsection

@section('content')
    <div class="container">
        <form action="{{ route('donhangs.store') }}" method="POST">
            @csrf
            <div class="row">
                <h2 class="text-center my-3">Đơn hàng</h2>
                <div class="col-6">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $key => $item)
                            <tr align="center">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="" alt="" style="width: 50px" class="flex-shrink-0 me-12 radius-8 me-12">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-normal fw-bold"> {{$item['ten_san_pham']}} </h6>
                                            <p class="text-smr">Số lượng: {{$item['so_luong']}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($item['gia'] * $item['so_luong'], 0, '', '.') }} <u>vnđ</u></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        <div class="d-flex justify-content-around">
                            <b>Thành tiền:</b><span>{{ number_format($subTotal, 0, '', '.') }} vnđ</span>
                            <input type="hidden" name="tien_hang" value="{{$subTotal}}">
                        </div>

                        <div class="d-flex justify-content-around">
                            <b>Cupon:</b><span style="color: red">- 0 vnđ</span>
                        </div>

                        <div class="d-flex justify-content-around">
                            <b>Phí ship:</b><span>{{ number_format($shipping, 0, '', '.') }} vnđ</span>
                            <input type="hidden" name="tien_ship" value="{{$shipping}}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="border-top shadow border-bottom w-75 border-secondary rounded-3 p-3 mt-3">
                            <h3 class="text-center fw-bolder">Thanh toán</h3>
                            <h5 class="text-center bg-light py-2 rounded-pill">{{ number_format($total, 0, '', '.') }} vnđ</h5>
                            <input type="hidden" name="tong_tien" value="{{$total}}">
                        </div>
                    </div>
                </div>

                <div class="col-1"></div>

                <div class="col-5 shadow rounded-3">
                    <h4 class="text-center mt-3">Thông tin khách hàng</h4>
                    <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">

                    <div class="mb-2">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="ten_nguoi_nhan"
                        value="{{ Auth::check() ? Auth::user()->ho_ten : '' }}">
                        @error('ten_nguoi_nhan')
                        <p class="text-danger"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="so_dien_thoai_nguoi_nhan"
                        value="{{ Auth::check() ? Auth::user()->so_dien_thoai : '' }}">
                        @error('so_dien_thoai_nguoi_nhan')
                        <p class="text-danger"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_nguoi_nhan"
                        value="{{ Auth::check() ? Auth::user()->email : '' }}">
                        @error('email_nguoi_nhan')
                        <p class="text-danger"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi_nguoi_nhan"
                        value="{{ Auth::check() ? Auth::user()->dia_chi : '' }}">
                        @error('dia_chi_nguoi_nhan')
                        <p class="text-danger"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Ghi chú</label>
                        <textarea cols="30" rows="3" class="form-control" name="ghi_chu"></textarea>
                    </div>

                    <form id="paymentForm" action="{{ route('payment.paypal.create') }}" method="GET">
                        <div class="mb-2">
                            <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                            <div>
                                <input type="radio" id="payment_cash" name="payment_method" value="cash" checked>
                                <label for="payment_cash">Thanh toán khi nhận hàng</label>
                            </div>
                            <div>
                                <input type="radio" id="payment_online" name="payment_method" value="online">
                                <label for="payment_online">Thanh toán online</label>
                            </div>
                        </div>

                        <div id="onlinePaymentSection" style="display:none;">
                            <h5>Thanh toán qua PayPal</h5>
                            <button type="submit" class="btn btn-primary">Thanh toán qua PayPal</button>
                        </div>

                        <button type="submit" class="btn btn-success w-100 my-3">Mua ngay</button>
                    </form>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const paymentForm = document.getElementById('paymentForm');
    
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            // Kiểm tra nếu người dùng chọn thanh toán online
            if (document.getElementById('payment_online').checked) {
                // Hiển thị phần thanh toán online
                document.getElementById('onlinePaymentSection').style.display = 'block';
            } else {
                // Ẩn phần thanh toán online
                document.getElementById('onlinePaymentSection').style.display = 'none';
            }
        });
    });

    // Kiểm tra trước khi gửi form
    paymentForm.addEventListener('submit', function (event) {
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        
        // Nếu người dùng chọn thanh toán khi nhận hàng, không gửi form đi
        if (paymentMethod !== 'online') {
            event.preventDefault();  // Ngừng gửi form
            alert('Vui lòng chọn phương thức thanh toán online để tiếp tục.');
        }
    });
});
</script>

@endsection
