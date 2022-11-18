<nav class="main-sidebar ps-menu">
    <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>
    <div class="sidebar-header">
        <div class="text">DP</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="<?php echo e(request()->segment(1) == '' || request()->segment(1) ==  'dashboard' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <hr class="mt-4">
            </li>
            <li class="<?php echo e(request()->segment(1) == '' || request()->segment(1) ==  'gizi' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('data-gizi.index')); ?>" class="link">
                    <i class="ti-briefcase"></i>
                    <span>Data Gizi</span>
                </a>
            </li>
            
            <li class="<?php echo e(request()->segment(1) == 'imunisasi' ? 'active open' : ''); ?>">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-shield"></i>
                    <span>Imunisasi</span>
                </a>
                <ul class="sub-menu <?php echo e(request()->segment(1) == 'imunisasi' ? 'expand' : ''); ?>">
                    <li><a href="element-ui.html" class="link"><span>Data Imunisasi</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'jenis-imunisasi' ? 'active' : ''); ?>"><a href="<?php echo e(route('jenis-imunisasi.index')); ?>" class="link"><span>Jenis Imunisasi</span></a></li>
                </ul>
            </li>
            <li>
                <hr class="mt-4">
            </li>
            <li class="<?php echo e(request()->segment(1) == 'unit-kesehatan' ? 'active open' : ''); ?>">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-wheelchair"></i>
                    <span>Unit Kesehatan</span>
                </a>
                <ul class="sub-menu <?php echo e(request()->segment(1) == 'unit-kesehatan' ? 'expand' : ''); ?>">
                    <li class="<?php echo e(request()->segment(2) == 'puskesmas' ? 'active' : ''); ?>"><a href="<?php echo e(route('puskesmas.index')); ?>" class="link"><span>Puskesmas</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'posyandu' ? 'active' : ''); ?>"><a href="<?php echo e(route('posyandu.index')); ?>" class="link"><span>Posyandu</span></a></li>
                </ul>
            </li>
            <li class="<?php echo e(request()->segment(1) == 'wilayah' ? 'active open' : ''); ?>">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-location-arrow"></i>
                    <span>Data Wilayah</span>
                </a>
                <ul class="sub-menu <?php echo e(request()->segment(1) == 'wilayah' ? 'expand' : ''); ?>">
                    <li class="<?php echo e(request()->segment(2) == 'kecamatan' ? 'active' : ''); ?>"><a href="<?php echo e(route('kecamatan.index')); ?>" class="link"><span>Kecamatan</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'desa' ? 'active' : ''); ?>"><a href="<?php echo e(route('desa.index')); ?>" class="link"><span>Desa</span></a></li>
                </ul>
            </li>
            <li class=" <?php echo e(request()->segment(1) == 'users' ? 'active open' : ''); ?>">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-user"></i>
                    <span>Akun Pengguna</span>
                </a>
                <ul class="sub-menu <?php echo e(request()->segment(1) == 'users' ? 'expand' : ''); ?>">
                    <li class="<?php echo e(request()->segment(2) == 'admin' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.index')); ?>" class="link"><span>Admin</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'admin-puskesmas' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin-puskesmas.index')); ?>" class="link"><span>Admin Puskesmas</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'bidan' ? 'active' : ''); ?>"><a href="<?php echo e(route('bidan.index')); ?>" class="link"><span>Bidan</span></a></li>
                    <li class="<?php echo e(request()->segment(2) == 'kader' ? 'active' : ''); ?>"><a href="<?php echo e(route('kader.index')); ?>" class="link"><span>Kader</span></a></li>
                </ul>
            </li>
            <li class="<?php echo e(request()->segment(1) ==  'pasien' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('data-pasien.index')); ?>" class="link">
                    <i class="ti-basketball"></i>
                    <span>Anak</span>
                </a>
            </li>
            
                
             
        </ul>
    </div>
</nav>  <?php /**PATH D:\Developement\DigiPosyandu\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>