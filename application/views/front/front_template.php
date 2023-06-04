<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= @$title ?> | <?= data_sistem('nama') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= data_sistem('deskripsi') ?>" name="description" />
    <meta content="<?= data_sistem('nama') ?>" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('uploads/img/logo.png') ?>">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <style>
        .fw-600 {
            font-weight: 600;
        }
    </style>
</head>

<body data-topbar="light" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" style="background-color: #B1E9EC !important;">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('uploads/img/logo.png') ?>" alt="" height="50">
                            </span>
                            <span class="logo-lg">
                                <div class="d-flex" style="align-items: center;">
                                    <img src="<?= base_url('uploads/img/logo.png') ?>" alt="" height="50">
                                    <h3 class="mb-0 fw-600">SIDOMULYO FOOD & CATERING</h3>
                                </div>
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('uploads/img/logo.png') ?>" alt="" height="50">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('uploads/img/logo.png') ?>" alt="" height="50">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <div class="topnav" style="background-color: #20797d !important;">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>">
                                    <i class="fa fa-home mr-2"></i>
                                    <span class="text-white">Beranda</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('menu') ?>">
                                    <i class="fas fa-th-large mr-2"></i>
                                    <span class="text-white">Daftar Menu</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('tentang-kami') ?>">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    <span class="text-white">Tentang Kami</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('cara-pesan') ?>">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <span class="text-white">Cara Pemesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login') ?>">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    <span class="text-white">Login</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <?php $this->load->view($index); ?>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                <?= data_sistem('nama') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <div id="modal_custom" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background-color: rgba(255, 255, 255, .5);">
        <div id="modal_custom_size" class="modal-dialog modal-xl">
            <div style="border: 0;" class="modal-content shadow1">
                <div class="modal-header bg-primary1">
                    <h5 class="modal-title mt-0">JUDUL</h5>
                    <button type="button" class="close" onclick="$('#modal_custom').modal('hide');">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, saepe esse sit nihil aperiam quae porro eveniet in recusandae consequatur reiciendis voluptatibus blanditiis magni! Aliquid ex minima distinctio at quod.
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="modal_custom_2" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, .5);">
        <div id="modal_custom_size_2" class="modal-dialog modal-xl">
            <div style="border: 0;" class="modal-content shadow1">
                <div class="modal-header bg-primary1">
                    <h5 class="modal-title mt-0">JUDUL</h5>
                    <button type="button" class="close" onclick="$('#modal_custom_2').modal('hide');">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, saepe esse sit nihil aperiam quae porro eveniet in recusandae consequatur reiciendis voluptatibus blanditiis magni! Aliquid ex minima distinctio at quod.
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script>
        const URL_ASSETS = "<?= base_url('assets/skote/dist/') ?>";
        const BASE_URL = "<?= base_url() ?>";
    </script>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/node-waves/waves.min.js"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- cdn select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="<?= base_url('assets/custom/my_app.js') ?>"></script>
    <?php $this->load->view($index_js); ?>
</body>

</html>