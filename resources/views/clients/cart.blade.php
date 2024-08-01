@extends('layouts.client')
@section('css')

@endsection
@section('content')
    <section>
        <div class="container ">

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{route('cart.update')}}" method="POST">
                @csrf
                <div class="row">
                    <h2 class="text-center mb-4">Giỏ hàng</h2>
                    <div class="col-9">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $key => $item)
                                <tr align="center" >
                                    <td>
                                        <div style="width: 100px; height: 100px"
                                             class="rounded border border-light overflow-hidden d-flex justify-content-center align-items-center">
                                            <img class="mh-100 mw-100" src="{{ Storage::url($item['hinh_anh']) }}">
                                            <input type="hidden" name="cart[{{$key}}][hinh_anh]"
                                                   value="{{ $item['hinh_anh'] }}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('product.detail', $key)}}">{{$item['ten_san_pham']}}</a>
                                        <input type="hidden" name="cart[{{$key}}][ten_san_pham]"
                                               value="{{ $item['ten_san_pham'] }}">
                                    </td>
                                    <td>
                                        {{ number_format($item['gia'], 0, '', '.') }} <u>vnđ</u>
                                        <input type="hidden" name="cart[{{$key}}][gia]" value="{{ $item['gia'] }}">
                                    </td>
                                    <td>
                                        <div class="pro-qty" style="cursor: pointer">
                                            <input style="width: 50px; text-align:center" class="quantityInput"
                                                   data-price="{{$item['gia']}}" value="{{ $item['so_luong'] }}"
                                                   type="text" name="cart[{{$key}}][so_luong]">
                                        </div>
                                    </td>
                                    <td>
                                    <span class="subtotal">
                                        {{ number_format($item['gia'] * $item['so_luong'], 0, '', '.') }}
                                    </span>
                                    </td>
                                    <td style="width: 1px" class="pro-remove">
                                        <a href="#" class="text-decoration-none text-danger">
                                            <iconify-icon icon="flowbite:trash-bin-outline" width="30"
                                                          height="30"></iconify-icon>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-3">
                        <div class="border shadow border-light rounded-3 p-3">
                            <h5 class="mt-2 ">Tổng:
                                <span class="sub-total"> {{number_format($subTotal, 0, '', '.')}} </span>
                            </h5>
                            <span>Phí ship:</span>
                            <span class="shipping"> {{number_format($shipping, 0, '', '.')}} </span>
                            <h5 class="text-danger pt-2 bg-light text-center">Thanh toán
                                <p class="total-amount"> {{number_format($total, 0, '', '.')}} </p>
                            </h5>

                            <a href="{{ route('donhangs.create') }}" class="btn btn-success w-100 my-2">Mua ngay</a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7"><span>Coupon</span>
                            <input type="text"></div>

                        <div class="col-2">
                            <button type="submit">update</button>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                </div>
            </form>


        </div>
    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');

        function updateTotal() {
            var subTotal = 0;
            // Tính tổng số tiền của các sản phẩm có trong giỏ hàng
            $('.quantityInput').each(function () {
                var $input = $(this);
                var price = parseFloat($input.data('price'));
                var quantity = parseFloat($input.val());
                subTotal += price * quantity;
            });

            // Lấy số tiền vận chuyển
            var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''));
            var total = subTotal + shipping;

            // Cập nhật giá trị
            $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ');
            $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ');

        }

        $('.qtybtn').on('click', function () {
            var $button = $(this);
            var $input = $button.parent().find('input');
            var oldValue = parseFloat($input.val());

            if ($button.hasClass('inc')) {
                var newVal = oldValue + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = oldValue - 1;
                } else {
                    var newVal = 1;
                }
            }

            $input.val(newVal);

            // Cập nhật lại giá trị của subtotal
            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subtotal');
            var newSubtotal = newVal * price;
            subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ');

            // Gọi updateTotal để cập nhật tổng số tiền
            updateTotal();
        });

        // Xử lý nếu người dùng nhập số âm
        $('.quantityInput').on('change', function () {
            var value = parseInt($(this).val(), 10);

            if (isNaN(value) || value < 1) {
                alert('Số lượng phải lớn hơn bằng 1.');
                $(this).val(1);
            }

            // Gọi updateTotal để cập nhật tổng số tiền
            updateTotal();
        })

        $('.pro-remove').on('click', function () {
            event.preventDefault(); // Chặn thao tác mặc định của thẻ a
            var $row = $(this).closest('tr');
            $row.remove(); // Xóa hàng

            // Gọi updateTotal để cập nhật tổng số tiền
            updateTotal();
        })

        updateTotal();

    </script>
@endsection
