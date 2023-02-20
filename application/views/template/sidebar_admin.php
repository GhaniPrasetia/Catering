<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div class="side-menu" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="<?= $this->uri->segment(2) == 'dashboard' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/dashboard') ?>" class="waves-effect fw-500">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="multi-link <?= in_array($this->uri->segment(3), ['list', 'tambah', 'kategori', 'form']) ? 'mm-active' : '' ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-th-large"></i>
                        <span key="t-utility">Daftar Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('admin/menu/list') ?>"><i class="fa fa-arrow-right text-white m-0"></i> List Menu</a></li>
                        <li><a href="<?= base_url('admin/menu/form') ?>"><i class="fa fa-arrow-right text-white m-0"></i> Tambah Menu</a></li>
                        <li><a href="<?= base_url('admin/menu/kategori') ?>"><i class="fa fa-arrow-right text-white m-0"></i> List Kategori</a></li>
                    </ul>
                </li>
                <li class="<?= $this->uri->segment(2) == 'paketan' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/paketan') ?>" class="waves-effect fw-500">
                        <i class="fas fa-th-large"></i>
                        <span>Daftar Paket</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'pesanan' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/pesanan') ?>" class="waves-effect fw-500">
                        <i class="fas fa-th-large"></i>
                        <span>PESANAN</span>
                    </a>
                </li>

                <li class="menu-title text-white" key="t-apps">Referensi</li>
                <li class="<?= $this->uri->segment(2) == 'informasi' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/informasi') ?>" class="waves-effect fw-500">
                        <i class="fa fa-laptop"></i>
                        <span>Informasi</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(3) == 'tentang_kami' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/page/tentang_kami') ?>" class="waves-effect fw-500">
                        <i class="fa fa-info-circle"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(3) == 'cara_pemesanan' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/page/cara_pemesanan') ?>" class="waves-effect fw-500">
                        <i class="fa fa-info-circle"></i>
                        <span>Cara Pemesanan</span>
                    </a>
                </li>

                <li class="menu-title text-white" key="t-apps">Setting</li>
                <li class="<?= $this->uri->segment(2) == 'data_user' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/data_user') ?>" class="waves-effect fw-500">
                        <i class="fa fa-users"></i>
                        <span>Data User</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'note' ? 'mm-active' : '' ?> single-link">
                    <a href="<?= base_url('admin/note') ?>" class="waves-effect fw-500">
                        <i class="fas fa-sticky-note"></i>
                        <span>Sticky Note</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->