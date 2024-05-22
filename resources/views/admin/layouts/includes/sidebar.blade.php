@php
    $name = Route::currentRouteName();
@endphp
<style>
    .text-white {
        border-radius: 20px;
        color: #ffffff;
        background-color: #F1C8DA;
    }
</style>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            @php
                $show = $name == 'admin.analysis'  ? 'show' : '';
                $active = $show == 'show' ? 'active' : '';
                $icon = $show == 'show' ? '' : 'collapsed';
            @endphp
            <a class="nav-link {{ $icon }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Phân tích</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.analysis') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Phân tích sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            @php
                $show = $name == 'admin.category.list' ? 'show' : '';
                $active = $show == 'show' ? 'active' : '';
                $icon = $show == 'show' ? '' : 'collapsed';
            @endphp
            <a class="nav-link {{ $icon }}" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý danh mục</span><i
                    class="bi  bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.list') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Danh sách danh mục</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            @php
                $show = $name == 'admin.product.list' ? 'show' : '';
                $active = $show == 'show' ? 'active' : '';
                $icon = $show == 'show' ? '' : 'collapsed';
            @endphp
            <a class="nav-link {{ $icon }}" data-bs-target="#icons-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-basket-fill"></i><span>Quản lý sản phẩm</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.product.list') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @php
                $show = $name == 'admin.order.list' || $name == 'admin.order.confirm'  ? 'show' : '';
                $active = $show == 'show' ? 'active' : '';
                $icon = $show == 'show' ? '' : 'collapsed';
            @endphp
            <a class="nav-link {{ $icon }}" data-bs-target="#cart-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-cart-check-fill"></i><span>Quản lý đơn hàng</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cart-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.order.list') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Danh sách đơn đã xác nhận</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.order.confirm') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Danh sách đơn cần xác nhận</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @php
                $show = $name == 'admin.user.list' ? 'show' : '';
                $active = $show == 'show' ? 'active' : '';
                $icon = $show == 'show' ? '' : 'collapsed';
            @endphp
            <a class="nav-link {{ $icon }}" data-bs-target="#user-nav" data-bs-toggle="collapse"
                href="#">
                <i class="ri-account-circle-fill"></i><span>Quản lý người dùng</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.user.list') }}" class="{{ $active }}">
                        <i class="bi bi-circle"></i><span>Danh sách người dùng</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</aside><!-- End Sidebar-->
