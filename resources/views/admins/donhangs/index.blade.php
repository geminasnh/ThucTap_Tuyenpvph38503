@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">{{$title}}</li>
        </ul>
    </div>{{--end title--}}

    <script>
        @if(session('thongbao'))
        alert('{{ session('thongbao') }}');
        @endif
    </script>
    <script>
        @if(session('error'))
        alert('{{ session('error') }}');
        @endif
    </script>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span>Hiển thị</span>
                    <select class="form-select form-select-sm w-auto">
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                    </select>
                </div>
           
            </div>
            <div class="d-flex flex-wrap align-items-center gap-3">
                <select class="form-select form-select-sm w-auto">
                    <option selected>Chọn danh mục</option>
                    <option value="1">Hoa quả</option>
                    <option value="2">Rau</option>
                </select>

            </div>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0">
                <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Ngày đặt</th>

                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listDonHang as $item)
                    <tr>
                        <td><a href="{{ route('admins.donhang.show', $item->id) }}">{{ $item->ma_don_hang }}</a></td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ number_format($item->tong_tien, 0, '', '.') }} vnđ</td>
                        <td>
                            <form action="{{ route('admins.donhang.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="trang_thai_don_hang" class="form-select"
                                        onchange="confirmSubmit(this)"
                                        data-default-value="{{$item->trang_thai_don_hang}}">
                                    @foreach($trangThaiDonHang as $key => $value)
                                        <option value="{{ $key }}"
                                            {{$key == $item->trang_thai_don_hang ? 'selected' : ''}}
                                            {{$key == $type_huy_don_hang ? 'disabled' : ''}}>
                                            {{$value}} </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admins.donhang.show', $item->id) }}"
                               class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>


                            @if($item->trang_thai_don_hang === $type_huy_don_hang)
                                <form action="{{ route('admins.donhang.destroy', $item->id) }}" method="post" class="d-inline-flex"
                                      onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-24">
                
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                           href="javascript:void(0)">
                            <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-600 text-white fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                           href="javascript:void(0)">
                            <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }
    </script>

@endsection
