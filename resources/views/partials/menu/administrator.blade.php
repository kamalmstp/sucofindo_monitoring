<div class="js-sidebar-scroll">
    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('administrator.index') ? ' active' : '' }}"
                   href="{{ route('administrator.index') }}">
                    <i class="nav-main-link-icon fa fa-home"></i>
                    <span class="nav-main-link-name">DASHBOARD</span>
                </a>
            </li>
            <!-- MONITORING SAMPEL -->
            <li class="nav-main-heading">MONITORING SAMPEL</li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('pengiriman.*') ? ' active' : '' }}"
                   href="{{ route('pengiriman.index') }}">
                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                    <span class="nav-main-link-name">Pengiriman Sampel</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('bahanbakar.*') ? ' active' : '' }}"
                   href="{{ route('bahanbakar.index') }}">
                    <i class="nav-main-link-icon fa fa-car"></i>
                    <span class="nav-main-link-name">BBM</span>
                </a>
            </li>
            <!-- END MONITORING SAMPEL -->

            <!-- MENU INPUT -->
            <li class="nav-main-heading">MENU INPUT</li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('weight.*') ? ' active' : '' }}"
                   href="{{ route('weight.index') }}">
                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                    <span class="nav-main-link-name">CPO</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('barges.*') ? ' active' : '' }}"
                   href="{{ route('barges.index') }}">
                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                    <span class="nav-main-link-name">BARGES</span>
                </a>
            </li>
            <!-- END MENU INPUT -->

            <!-- MENU REPORT -->
            <li class="nav-main-heading">REPORT</li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('report.weight') ? ' active' : '' }}"
                   href="{{ route('report.weight') }}">
                    <i class="nav-main-link-icon fa fa-print"></i>
                    <span class="nav-main-link-name">REPORT CPO</span>
                </a>
            </li>
            <!-- END MENU REPORT -->

            <!-- PENGATURAN -->
            <li class="nav-main-heading">PENGATURAN</li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('users/*') ? ' active' : '' }}"
                   href="{{ route('users.index') }}">
                    <i class="nav-main-link-icon fa fa-users-cog"></i>
                    <span class="nav-main-link-name">DATA PENGGUNA</span>
                </a>
            </li>
            <!-- END PENGATURAN -->

            <li class="nav-main-item">
                <a class="nav-main-link" href="#" onclick="confirmLogout()">
                    <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                    <span class="nav-main-link-name">LOGOUT</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</div>
