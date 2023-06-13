<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('uploads/img/logo.png') ?>">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?= base_url('assets/skote/dist/') ?>assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/skote/dist/') ?>assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/skote/dist/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <style>
        .auth-full-bg .bg-overlay {
            background: url('<?= base_url('uploads/img/bg_food.jpg') ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .auth-full-bg {
            background-color: rgb(67 89 194);
        }
    </style>
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel owl-loaded owl-drag" id="auth-review-carousel">
                                                        <div class="owl-stage-outer">
                                                            <div class="owl-stage">
                                                                <div class="owl-item border border-primary" style="border-radius: 20px !important;background-color: rgba(255, 255, 255, .7);">
                                                                    <div class="item">
                                                                        <div class="py-3">
                                                                            <p class="font-size-16" style="font-weight: 600;">
                                                                                CATERING ONLINE
                                                                                <br>
                                                                                <?= data_sistem('nama') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4" style="background-color: aliceblue;">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="my-auto">

                                    <div class="text-center">
                                        <img src="<?= base_url('uploads/img/logo.png') ?>" alt="logo" style="width: 100px;" class="img">
                                        <h5 class="text-primary">Selamat datang</h5>
                                        <p class="text-muted">Silahkan login</p>
                                    </div>

                                    <div class="mt-4">
                                        <form action="#" id="form_data" class="js-validation-signin">

                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                            </div>

                                            <div class="form-group">
                                                <label for="userpassword">Password</label>
                                                <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"><i class="fas fa-sign-in-alt mr-1"></i> Login</button>
                                            </div>

                                        </form>
                                        <div class="mt-2 text-center">
                                            <a href="<?= base_url() ?>">Kembali ke beranda</a>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <a class="fw-600 text-danger" style="text-decoration: underline !important;" href="<?= base_url('login/registrasi') ?>">Belum Punya akun ?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        | <?= data_sistem('deskripsi') ?>
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/node-waves/waves.min.js"></script>

    <!-- owl.carousel js -->
    <script src="<?= base_url('assets/skote/dist/') ?>assets/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- auth-2-carousel init -->
    <script src="<?= base_url('assets/skote/dist/') ?>assets/js/pages/auth-2-carousel.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/skote/dist/') ?>assets/js/app.js"></script>
    <!-- Page JS Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const URL = "<?= base_url() ?>";

        var validation_tambah = function() {
            var validation_tambah = function() {
                jQuery('.js-validation-signin').validate({
                    errorClass: 'invalid-feedback animate__animated animate__fadeInDown',
                    errorElement: 'div',
                    errorPlacement: function(error, e) {
                        jQuery(e).parents('.form-group').append(error);
                    },
                    highlight: function(e) {
                        jQuery(e).removeClass('is-invalid').addClass('is-invalid');
                    },
                    success: function(e, ee) {
                        jQuery(ee).removeClass('is-invalid');
                        jQuery(e).remove();
                    },
                    rules: {
                        'username': {
                            required: true,
                        },
                        'password': {
                            required: true,
                        }
                    },
                    messages: {
                        'username': {
                            required: 'Username tidak boleh kosong',
                        },
                        'password': {
                            required: 'Password tidak boleh kosong',
                        }
                    }
                });

                $('#form_data').on('submit', function(e) {
                    if ($(this).valid()) {
                        e.preventDefault();
                        submit_data(this);
                    }
                });

            };

            return {
                init: function() {
                    validation_tambah();
                }
            };
        }();

        $(document).ready(function() {

            jQuery(function() {
                validation_tambah.init();
            });

        });

        function submit_data(data) {
            var data = new FormData(data);

            $.ajax({
                url: URL + 'login/auth',
                type: "POST",
                data: data,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // console.log('sedang menghapus');
                },
                complete: function() {
                    // console.log('Berhasil');
                },
                error: function(e) {
                    console.log(e);
                    toastr.error('gagal, terjadi kesalahan', {
                        timeOut: 1000,
                        fadeOut: 1000
                    });
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success(data.msg);
                        setTimeout(() => {
                            location.replace(data.link);
                        }, 1000);
                    } else {
                        toastr.error(data.msg);
                        $('input[name=password]').val('');
                    }
                },
            });
        }
    </script>
</body>

</html>