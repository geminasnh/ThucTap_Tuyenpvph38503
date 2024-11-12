<div class="row align-items-center justify-content-between">
    <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-4">
            <button type="button" class="sidebar-toggle">
                <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
            </button>
            <button type="button" class="sidebar-mobile-toggle">
                <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
            </button>
            <form class="navbar-search">
                <input type="text" name="search" placeholder="Search">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
            </form>
        </div>
    </div>
    <div class="col-auto">
        <div class="d-flex flex-wrap align-items-center gap-3">

            <div class="dropdown">
                <button
                    class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                    type="button" data-bs-toggle="dropdown">
                    <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                </button>
                <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                    <div
                        class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                        <div>
                            <h6 class="text-lg text-primary-light fw-semibold mb-0">Tin nhắn</h6>
                        </div>
                        <span
                            class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                    </div>

                    <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

                        <a href="javascript:void(0)"
                           class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                            <div
                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                              <img src="{{asset('img/chat.jpg')}}" alt="">
                              <span
                                      class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                            </span>
                                <div>
                                    <h6 class="text-md fw-semibold mb-4">Tuyển</h6>
                                    <p class="mb-0 text-sm text-secondary-light text-w-100-px">Xin chao!</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                <span
                                        class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                            </div>
                        </a>


                    </div>
                    <div class="text-center py-12 px-16">
                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">Xem tất cả tin
                            nhắn</a>
                    </div>
                </div>
            </div><!-- Message dropdown end -->

            <div class="dropdown">
                <button
                        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown">
                    <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                </button>
                <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                    <div
                            class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                        <div>
                            <h6 class="text-lg text-primary-light fw-semibold mb-0">Thông báo</h6>
                        </div>
                        <span
                                class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                    </div>

                    <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                        <a href="javascript:void(0)"
                           class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                            <div
                                    class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                <span
                                        class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                  <iconify-icon icon="bitcoin-icons:verify-outline"
                                                class="icon text-xxl"></iconify-icon>
                                </span>
                                <div>
                                    <h6 class="text-md fw-semibold mb-4">Chúc mừng</h6>
                                    <p class="mb-0 text-sm text-secondary-light text-w-200-px">Bạn đã xác minh tài khoản
                                        thành công...</p>
                                </div>
                            </div>
                            <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                        </a>

                    </div>

                    <div class="text-center py-12 px-16">
                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">Xem tất cả thông
                            báo</a>
                    </div>

                </div>
            </div><!-- Notification dropdown end -->

            <div class="dropdown">
                <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                        data-bs-toggle="dropdown">
                    <img src="{{asset('img/1.jpg') ? asset('img/1.jpg') : Auth::user()->anh_dai_dien}}" alt="image"
                         class="w-40-px h-40-px object-fit-cover rounded-circle">
                </button>
                <div class="dropdown-menu to-top dropdown-menu-sm">
                    <div
                            class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                        <div>
                             <h6 class="text-lg text-primary-light fw-semibold mb-2">{{Auth::user()->name}}</h6>
                             <span class="text-secondary-light fw-medium text-sm">{{Auth::user()->role}}</span>
                        </div>
                        <button type="button" class="hover-text-danger">
                            <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                        </button>
                    </div>
                    <ul class="to-top-list">
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                               href="{{route('profile.show')}}">
                                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                My Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                               href="#">
                                <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>
                                Inbox</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                               href="#">
                                <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon>
                                Setting</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">
                                    <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                    Log Out</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div><!-- Profile dropdown end -->
        </div>
    </div>
</div>
