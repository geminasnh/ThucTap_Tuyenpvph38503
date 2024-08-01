@component('mail::message')
    #Confirm order

    Hello: {{ $donHang->ten_nguoi_nhan }}

    Thanks for your order!

    ** OrderID: ** {{ $donHang->ma_don_hang }}

    ** Products: **
    @foreach($donHang->chiTietDonHang as $item)
        - {{ $item->sanPham->ten_san_pham }} * {{$item->so_luong}}: {{ number_format($item->thanh_tien) }} VND
    @endforeach

    ** Total amount: ** {{ number_format($donHang->tong_tien) }}

    We will contact to you soon, Thanks!

    from,
    {{ config('app.name') }}
@endcomponent
