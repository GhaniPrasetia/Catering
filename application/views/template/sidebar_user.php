<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div class="side-menu" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="<?= $this->uri->segment(2) == 'dashboard' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('user/dashboard') ?>" class="waves-effect fw-500">
                        <i class="fa fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'menu_list' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('user/menu_list') ?>" class="waves-effect fw-500">
                        <i class="fas fa-th-large"></i>
                        <span>Menu</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'pesanan' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('user/pesanan') ?>" class="waves-effect fw-500">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Pesanan Saya</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'tentang' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('user/page/tentang') ?>" class="waves-effect fw-500">
                        <i class="fas fa-user-circle"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'cara_pesan' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('user/page/cara_pesan') ?>" class="waves-effect fw-500">
                        <i class="fas fa-info-circle"></i>
                        <span>Cara Pemesanan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->