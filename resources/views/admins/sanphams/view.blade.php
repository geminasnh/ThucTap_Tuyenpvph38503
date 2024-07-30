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

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-11 col-lg-12">

                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data"
                              class="row justify-content-center">
                            @csrf
                            <div class="col-xxl-5 col-xl-5 col-lg-5">
                                <div class="mt-5">
                                    <h6 class="text-md text-primary-light">Ảnh sản phẩm</h6>

                                    <div class="card-body">

                                        <img src="{{ Storage::url($chiTietSp->hinh_anh) }}" id="uploaded-img"
                                             style="width: 100px">
                                    </div>
                                </div>

                                <div class="my-3">
                                    <h6 class="text-md text-primary-light mb-16">Album ảnh</h6>
                                    <table class="">
                                        <tbody id="img-table" class="d-flex justify-content-center align-items-center">
                                        @foreach($chiTietSp->hinhAnhSanPham as $index => $img)
                                            <tr class="me-4">
                                                <td>
                                                    <img id="preview_{{ $index }}"
                                                         src="{{ Storage::url($img->hinh_anh) }}" alt=""
                                                         style="width: 45px;">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mã sản
                                        phẩm
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('ma_sp') is-invalid @enderror"
                                           name="ma_sp"
                                           placeholder="Nhập mã sản phẩm" value="{{$chiTietSp->ma_sp}}" disabled>
                                    @error('ma_sp')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tên sản
                                        phẩm
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('ten_san_pham') is-invalid @enderror"
                                           name="ten_san_pham"
                                           placeholder="Nhập tên sản phẩm" value="{{$chiTietSp->ten_san_pham}}"
                                           disabled>
                                    @error('ten_san_pham')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số lượng
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('so_luong') is-invalid @enderror"
                                           name="so_luong"
                                           placeholder="Nhập số lượng" value="{{$chiTietSp->so_luong}}" disabled>
                                    @error('so_luong')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá sản
                                        phẩm
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('gia') is-invalid @enderror"
                                           name="gia"
                                           placeholder="Nhập giá tiền sản phẩm" value="{{$chiTietSp->gia}}"
                                           disabled>
                                    @error('gia')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá khuyến
                                        mãi</label>
                                    <input type="text"
                                           class="form-control radius-8 @error('gia_khuyen_mai') is-invalid @enderror"
                                           name="gia_khuyen_mai"
                                           placeholder="Nhập giá khuyến mãi sản phẩm"
                                           value="{{$chiTietSp->gia_khuyen_mai}}" disabled>
                                    @error('gia_khuyen_mai')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày nhập
                                        <span class="text-danger-600">*</span></label>
                                    <input type="date"
                                           class="form-control radius-8 @error('ngay_nhap') is-invalid @enderror"
                                           name="ngay_nhap" value="{{$chiTietSp->ngay_nhap}}" disabled>
                                    @error('ngay_nhap')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mô tả
                                        ngắn</label>
                                    <textarea cols="30" rows="3"
                                              class="form-control radius-8 @error('mo_ta_ngan') is-invalid @enderror"
                                              name="mo_ta_ngan" disabled>{{ $chiTietSp->mo_ta_ngan }}</textarea>
                                    @error('mo_ta_ngan')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label for="desig"
                                           class="form-label fw-semibold text-primary-light text-sm mb-8">Danh mục
                                        sản phẩm <span class="text-danger-600">*</span></label>
                                    <select
                                        class="form-control radius-8 form-select @error('danh_muc_id') is-invalid @enderror"
                                        name="danh_muc_id" id="desig" disabled>
                                        <option selected>--- Vui lòng chọn ---</option>
                                        @foreach($listDanhMuc as $item)
                                            <option
                                                value="{{$item->id}}" {{ $item->id == $chiTietSp->danh_muc_id ? 'selected' : '' }}>{{$item->ten_danh_muc}}</option>
                                        @endforeach
                                    </select>
                                    @error('danh_muc_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Trạng thái
                                        <span class="text-danger-600">*</span></label>
                                    <div class="d-flex align-items-center flex-wrap gap-28">
                                        <div class="form-check checked-primary d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="is_type"
                                                   id="horizontal1" value="1"
                                                   {{ $chiTietSp->is_type == 1 ? 'checked' : '' }} disabled>
                                            <label
                                                class="form-check-label line-height-1 fw-medium text-secondary-light"
                                                for="horizontal1"> Hiện </label>
                                        </div>
                                        <div class="form-check checked-secondary d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="is_type"
                                                   id="horizontal2" value="0"
                                                   {{ $chiTietSp->is_type == 0 ? 'checked' : '' }} disabled>
                                            <label
                                                class="form-check-label line-height-1 fw-medium text-secondary-light"
                                                for="horizontal2"> Ẩn</label>
                                        </div>
                                    </div>
                                </div>

                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tùy
                                    chỉnh</label>
                                <div class="d-flex align-items-center flex-wrap gap-28">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="horizontal1" name="is_new"
                                               {{ $chiTietSp->is_new ? 'checked' : '' }} disabled>
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                               for="horizontal1">New</label>
                                    </div>
                                    <div class="form-switch switch-success d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="horizontal3" name="is_hot"
                                               {{ $chiTietSp->is_hot ? 'checked' : '' }} disabled>
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                               for="horizontal3">Hot</label>
                                    </div>
                                    <div class="form-switch switch-warning d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="horizontal4" name="is_home"
                                               {{ $chiTietSp->is_home ? 'checked' : '' }} disabled>
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                               for="horizontal4">Home</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xxl-7 col-xl-7 col-lg-7">

                                <div class="card border mt-32">
                                    <div class="card-header">
                                        <h5 class="mb-0">Nội dung chi tiết</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="editor" style="height: 1200px; overflow-y: auto;"></div>
                                        <textarea name="noi_dung" id="noi_dung_content" class="d-none">
                                            {{ $chiTietSp->noi_dung }}
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="card border mt-20">
                                <div class="card-header">
                                    <h5 class="mb-0">Danh sách bình luận</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Người dùng</th>
                                            <th>Nội dung</th>
                                            <th>Thời gian</th>
                                            <th>Trạng thái</th>
                                            <th style="width: 85px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listBinhLuan as $index => $comment)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $comment->nguoiDung->name ?? 'Không xác định' }}</td>
                                                <td>{{ $comment->noi_dung }}</td>
                                                <td>{{ $comment->thoi_gian }}</td>
                                                <td>
                                                    @if($comment->trang_thai == 1)
                                                        <span class="badge bg-success">Đã duyệt</span>
                                                    @elseif($comment->trang_thai == 0)
                                                        <span class="badge bg-danger">Chưa duyệt</span>
                                                    @endif
                                                </td>
                                                <td class="text-nowrap">
                                                    <form method="POST"
                                                          action="{{route('admins.sanpham.destroy', $item->id)}}"
                                                          onsubmit="return confirm('Xác nhận xoá?')"
                                                          class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{route('admins.sanpham.index')}}" class="btn btn-light-100 text-dark "><i
                                        class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                <a href="{{route('admins.sanpham.update', $chiTietSp->id)}}"
                                   class="btn btn-warning-600 radius-8">Sửa</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#editor', {
                theme: 'snow',
                readOnly: true,
            });

            var old_content = `{!! $chiTietSp->noi_dung !!}`;
            quill.root.innerHTML = old_content;

            quill.on('text-change', function () {
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html;
            });
        });
    </script>
@endsection
