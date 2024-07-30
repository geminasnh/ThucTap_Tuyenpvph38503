@extends('layouts.admin')

@section('content')
<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
<h6 class="fw-semibold mb-0">View Profile</h6>
<ul class="d-flex align-items-center gap-2">
<li class="fw-medium">
<a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
  <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
  Dashboard
</a>
</li>
<li>-</li>
<li class="fw-medium">View Profile</li>
</ul>
</div>

  <div class="row gy-4">
      <div class="col-lg-12">
          <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">

              <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                @foreach($user as $index => $pt)
                  <div class="text-center border border-top-0 border-start-0 border-end-0">
                      <img src="assets/images/user-grid/user-grid-img14.png" alt="" class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                      <h6 class="mb-0 mt-16">{{$pt->name}}</h6>
                      <span class="text-secondary-light mb-16">{{$pt->email}}</span>
                  </div>
                  <div class="mt-24">
                      <h6 class="text-xl mb-16">Personal Info</h6>
                      <ul>
                          <li class="d-flex align-items-center gap-1 mb-12">
                              <span class="w-30 text-md fw-semibold text-primary-light">Họ Tên</span>
                              <span class="w-70 text-secondary-light fw-medium">: {{$pt->name}}</span>
                          </li>
                          <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Tài khoản</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{$pt->ho_ten}}</span>
                        </li>
                          <li class="d-flex align-items-center gap-1 mb-12">
                              <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                              <span class="w-70 text-secondary-light fw-medium">: {{$pt->email}}</span>
                          </li>
                          <li class="d-flex align-items-center gap-1 mb-12">
                              <span class="w-30 text-md fw-semibold text-primary-light"> Số điện thoại</span>
                        <span class="w-70 text-secondary-light fw-medium">: {{$pt->so_dien_thoai}}</span>
                          </li>
                          <li class="d-flex align-items-center gap-1 mb-12">
                              <span class="w-30 text-md fw-semibold text-primary-light"> Ngày tạo</span>
                              <span class="w-70 text-secondary-light fw-medium">: {{$pt->ngay_sinh}}</span>
                          </li>
                          <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light"> Địa chỉ</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{$pt->dia_chi}}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                          <span class="w-30 text-md fw-semibold text-primary-light"> Giới tính</span>
                          <span class="w-70 text-secondary-light fw-medium">: {{$pt->gioi_tinh}}</span>
                      </li>
                      <li class="d-flex align-items-center gap-1 mb-12">
                        <span class="w-30 text-md fw-semibold text-primary-light"> Trạng thái</span>
                        <span class="w-70 text-secondary-light fw-medium">: {{$pt->trang_thai}}</span>
                    </li>



                      </ul>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>

  </div>
</div>
@endsection
