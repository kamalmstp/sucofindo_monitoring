<div class="js-sidebar-scroll">
    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('driver.index') ? ' active' : '' }}"
                   href="{{ route('driver.index') }}">
                    <i class="nav-main-link-icon fa fa-home"></i>
                    <span class="nav-main-link-name">DASHBOARD</span>
                </a>
            </li>
            <!-- DATA MASTER -->
            <li class="nav-main-heading">DATA MASTER</li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->routeIs('driver.pengiriman.*') ? ' active' : '' }}"
                   href="{{ route('driver.pengiriman.index') }}">
                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                    <span class="nav-main-link-name">Pengiriman Sampel</span>
                </a>
            </li>
            <!--<li class="nav-main-item">-->
            <!--    <a class="nav-main-link{{ request()->routeIs('driver.bahanbakar.*') ? ' active' : '' }}"-->
            <!--       href="{{ route('driver.bahanbakar.index') }}">-->
            <!--        <i class="nav-main-link-icon fa fa-car"></i>-->
            <!--        <span class="nav-main-link-name">BBM</span>-->
            <!--    </a>-->
            <!--</li>-->
            <!-- END DATA MASTER -->

            <!-- PENGATURAN -->
            <li class="nav-main-heading">PENGATURAN</li>
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
