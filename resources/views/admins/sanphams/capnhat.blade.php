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

                        <form action="{{route('admins.sanpham.update', $chiTietSp->id)}}" method="POST"
                              enctype="multipart/form-data"
                              class="row justify-content-center">
                            @csrf
                            @method('PUT')
                            <div class="col-xxl-5 col-xl-5 col-lg-5">
                                <div class="mt-5">
                                    <h6 class="text-md text-primary-light">Ảnh sản phẩm</h6>

                                    <div class="card-body">
                                        <label for="file-upload" class="mb-28 me-10 border border-neutral-600 fw-medium
                                            text-secondary-light px-16 py-12 radius-12 d-inline-flex align-items-center gap-2 bg-hover-neutral-200">
                                            <iconify-icon icon="solar:upload-linear" class="text-xl"></iconify-icon>
                                            Tải ảnh lên
                                            <input type="file" class="form-control w-auto mt-24 form-control-lg"
                                                   id="file-upload"
                                                   name="hinh_anh" onchange="showImg(event)" hidden>
                                        </label>
                                        <img class="d-inline" src="{{ Storage::url($chiTietSp->hinh_anh) }}" id="uploaded-img"
                                             style="width: 100px">
                                    </div>
                                </div>

                                <div class="my-3">
                                    <div class="d-flex">
                                        <h6 class="text-md text-primary-light mb-10 me-4">Album ảnh: </h6>
                                        <iconify-icon id="add-row" icon="ic:baseline-plus" class="fs-5 ms-2"
                                                      style="cursor: pointer"></iconify-icon>
                                    </div>

                                    <table class=" align-middle table-nowrap mb-0">
                                        <tbody id="img-table">
                                        @foreach($chiTietSp->hinhAnhSanPham as $index => $img)
                                            <tr>
                                                <td class="d-flex align-items-center justify-content-around me-12 my-6">
                                                    <img id="preview_{{ $index }}"
                                                         src="{{ Storage::url($img->hinh_anh) }}" alt=""
                                                         style="width: 50px; height: 50px">
                                                    <input type="file" id="hinh_anh"
                                                           name="list_hinh_anh[id_{{ $img->id }}]"
                                                           class="form-control ms-20"
                                                           onchange="previewImg(this, {{ $index }})">
                                                    <input type="hidden" name="list_hinh_anh[id_{{ $img->id }}]"
                                                           value="{{ $img->id }}">
                                                </td>
                                                <td class="pt-16">
                                                    <iconify-icon icon="ion:trash-bin-outline" width="30" height="30"
                                                                  style="cursor: pointer"
                                                                  onclick="removeRow(this)"></iconify-icon>
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
                                           placeholder="Nhập mã sản phẩm" value="{{$chiTietSp->ma_sp}}">
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
                                           placeholder="Nhập tên sản phẩm" value="{{$chiTietSp->ten_san_pham}}">
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
                                           placeholder="Nhập số lượng" value="{{$chiTietSp->so_luong}}">
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
                                           placeholder="Nhập giá tiền sản phẩm" value="{{$chiTietSp->gia}}">
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
                                           value="{{$chiTietSp->gia_khuyen_mai}}">
                                    @error('gia_khuyen_mai')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày nhập
                                        <span class="text-danger-600">*</span></label>
                                    <input type="date"
                                           class="form-control radius-8 @error('ngay_nhap') is-invalid @enderror"
                                           name="ngay_nhap" value="{{$chiTietSp->ngay_nhap}}">
                                    @error('ngay_nhap')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mô tả
                                        ngắn</label>
                                    <textarea cols="30" rows="3"
                                              class="form-control radius-8 @error('mo_ta_ngan') is-invalid @enderror"
                                              name="mo_ta_ngan">{{ $chiTietSp->mo_ta_ngan }}</textarea>
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
                                        name="danh_muc_id" id="desig">
                                        <option selected>--- Vui lòng chọn ---</option>
                                        @foreach($listDanhMuc as $item)
                                            <option
                                                value="{{$item->id}}"{{ $item->id == $chiTietSp->danh_muc_id ? 'selected' : '' }}>
                                                {{$item->ten_danh_muc}}
                                            </option>
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
                                                {{ $chiTietSp->is_type == 1 ? 'checked' : '' }} >
                                            <label
                                                class="form-check-label line-height-1 fw-medium text-secondary-light"
                                                for="horizontal1"> Hiện </label>
                                        </div>
                                        <div class="form-check checked-secondary d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="is_type"
                                                   id="horizontal2" value="0"
                                                {{ $chiTietSp->is_type == 0 ? 'checked' : '' }} >
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
                                            {{ $chiTietSp->is_new ? 'checked' : '' }} >
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                               for="horizontal1">New</label>
                                    </div>
                                    <div class="form-switch switch-success d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="horizontal3" name="is_hot"
                                            {{ $chiTietSp->is_hot ? 'checked' : '' }} >
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                               for="horizontal3">Hot</label>
                                    </div>
                                    <div class="form-switch switch-warning d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="horizontal4" name="is_home"
                                            {{ $chiTietSp->is_home ? 'checked' : '' }} >
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

                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center mt-3">
                                <a href="{{route('admins.sanpham.index')}}" class="btn btn-light-100 text-dark "><i
                                        class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                <button type="reset" class="btn btn-warning-600 radius-8 ">Nhập lại</button>
                                <button class="btn btn-success-600 radius-8 "><i class="fa-solid fa-plus"></i> Lưu
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @if(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            //show old content
            var old_content = `{!! $chiTietSp->noi_dung  !!}`;
            quill.root.innerHTML = old_content

            //update textarea
            quill.on('text-change', function () {
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html
            })
        })

    </script>
    <script>
        function showImg(event) {
            const img_sp = document.querySelector('#uploaded-img');

            const file = event.target.files[0];

            //lay link anh vua chon
            const reader = new FileReader();

            reader.onload = function () {
                //lay link vao src
                img_sp.src = reader.result;
                img_sp.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }

        }

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var rowCount = {{ count($chiTietSp->hinhAnhSanPham) }};
            document.getElementById('add-row').addEventListener('click', function () {
                var tableBody = document.getElementById('img-table');

                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td class="d-flex align-items-center justify-content-around me-12 my-6">
                        <img id="preview_${rowCount}" src="" alt="" style="width: 45px;">
                        <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]"
                               class="form-control ms-20" onchange="previewImg(this, ${rowCount})">
                    </td>
                    <td class="pt-16">
                    <iconify-icon icon="ion:trash-bin-outline" width="30" height="30" style="cursor: pointer" onclick="removeRow(this)"></iconify-icon>
                    </td>
                `;

                tableBody.appendChild(newRow);
                rowCount++;
            })
        });

        function previewImg(input, rowindex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById(`preview_${rowindex}`).setAttribute('src', e.target.result)
                }

                reader.readAsDataURL(input.files[0])
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }

    </script>
@endsection
