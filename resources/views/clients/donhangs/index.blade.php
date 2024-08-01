@extends('layouts.client')

@section('css')

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
                    <td><a href="{{ route('donhangs.show', $item->id) }}" class="btn btn-success btn-sm">Xem</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
@section('js')

@endsection


