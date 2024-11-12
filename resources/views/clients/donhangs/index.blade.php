@extends('layouts.client')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Optional: link to custom CSS file -->
@endsection

@section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donHang as $item)
                    <tr>
                        <td><a href="{{ route('donhangs.show', $item->id) }}">{{ $item->ma_don_hang }}</a> </td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $trangThaiDonHang[$item->trang_thai_don_hang] }}</td>
                        <td>{{ number_format($item->tong_tien, 0, '', '.') }} vnđ</td>
                        <td class="text-center">
                            <a href="{{ route('donhangs.show', $item->id) }}" class="btn btn-success btn-sm">Xem</a>
                            <form action="{{ route('donhangs.update', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                @if($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                    <input type="hidden" name="huy_don_hang" value="1">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận hủy')">Hủy</button>
                                @elseif($item->trang_thai_don_hang === $type_dang_van_chuyen)
                                    <input type="hidden" name="da_giao_hang" value="1">
                                    <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Xác nhận Đã nhận hàng')">Đã nhận hàng</button>
                                @else
                                   
                                @endif
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/custom.js') }}"></script>  <!-- Optional JavaScript -->
@endsection
