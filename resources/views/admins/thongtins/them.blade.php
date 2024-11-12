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
            {{-- <li class="fw-medium">{{$title}}</li> --}}
        </ul>
    </div>{{--end title--}}

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{route('admins.thongtin.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span
                                          class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" name="email"
                                      placeholder="Nhập email" required>
                              </div>
                              <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số điện thoại
                                    <span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" name="phone_number"
                                    placeholder="Nhập số điện thoại" required>
                            </div>
                                <h6 class="text-md text-primary-light mb-16">Logo</h6>
                                <div class="card-body p-24">

                                    <label for="file-upload" class="mb-16 border border-neutral-600 fw-medium
                                    text-secondary-light px-16 py-12 radius-12 d-inline-flex align-items-center gap-2 bg-hover-neutral-200">
                                        <iconify-icon icon="solar:upload-linear" class="text-xl"></iconify-icon>
                                        Tải logo lên
                                        <input type="file" class="form-control w-auto mt-24 form-control-lg"
                                               id="file-upload"
                                               name="logo" onchange="showImg(event)" hidden>
                                    </label>
                                    <img src="" id="uploaded-img" style="display: none; width: 100px">
                                </div>
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Địa chỉ <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" name="address" required>
                              </div>
                        


                                <div class="text-center mt-3">
                                    <a href="{{route('admins.danhmuc.index')}}" class="btn btn-light-100 text-dark "><i
                                            class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                    <button type="reset" class="btn btn-warning-600 radius-8 ">Nhập lại</button>
                                    <button class="btn btn-success-600 radius-8 "><i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
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
@endsection
