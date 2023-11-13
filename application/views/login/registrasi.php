<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Registrasi - <?= data_sistem('nama') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= data_sistem('deskripsi') ?>" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('uploads/img/logo.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/skote/dist/') ?>assets/libs/owl.carousel/assets/owl.theme.default.min.css">

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

        .bg_custom {
            background-color: #6dcfc845 !important;
        }

        body {
            background: linear-gradient(180deg, #ffffff, #ffffff, #6dcfc8);
        }
    </style>
</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="bg_custom">
                            <div class="row">
                                <div class="col-7">
                                    <div class="p-4">
                                        <h2 class="fw-600 text-primary">PENDAFTARAN AKUN</h2>
                                        <p>
                                            Untuk dapat melakukan pemesanan catering, diwajibkan melakukan registrasi terlebih dahulu.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end d-flex" style="justify-content: end;">
                                    <img src="<?= base_url('assets/skote/dist/') ?>assets/images/profile-img.png" alt="" class="img-fluid" style="width: 250px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form action="#" id="form_data" class="js-validation-signin form-horizontal">

                                    <div class="row mt-3">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Nama Lengkap <small class="text-danger fw-600">*</small></label>
                                                <input type="text" required name="nama" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email <small class="text-danger fw-600">*</small></label>
                                                <input type="email" required name="email" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat <small class="text-danger fw-600">*</small></label>
                                                <input type="text" required name="alamat" placeholder="Masukkan isian" class="form-control">
                                            </div>
											<!-- <div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Kecamatan</label>
														<select required name="kecamatan" onchange="pilih_kecamatan(this);" class="form-control js_select2" data-placeholder="pilih kecamatan">
															<option value=""></option>
															<?php foreach ($ref_kec as $dt) : ?>
																<option <?= $dt->kode_wilayah == @$data->kode_kec ? 'selected' : '' ?> value="<?= $dt->kode_wilayah ?>"><?= $dt->nama ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kelurahan</label>
														<select required name="kelurahan" id="select_kelurahan" class="form-control js_select2" data-placeholder="pilih kelurahan">
															<option value=""></option>
															<?php foreach ($ref_kel as $dt) : ?>
																<option <?= $dt->kode_wilayah == @$data->kode_kel ? 'selected' : '' ?> value="<?= $dt->kode_wilayah ?>"><?= $dt->nama ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div> -->

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomer HP <small class="text-danger fw-600">*</small></label>
                                                <input type="number" minlength="10" required name="no_hp" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Username <small class="text-danger fw-600">*</small></label>
                                                <input type="text" minlength="6" required name="username" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password <small class="text-danger fw-600">*</small></label>
                                                <input type="password" minlength="6" autocomplete="off" id="password" required name="password" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ulangi Password <small class="text-danger fw-600">*</small></label>
                                                <input type="password" minlength="6" autocomplete="off" required name="re_password" placeholder="Masukkan isian" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light fw-600" type="submit"><i class="fa fa-check mr-1"></i> DAFTAR</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Kembali ke <a href="<?= base_url() ?>" class="text-primary">Beranda</a></p>
                                    </div>

                                    <p class="text-center">Sudah Punya Akun ? <a href="<?= base_url('login') ?>" class="font-weight-medium text-primary"> Login</a> </p>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>© <?= date('Y') ?> <?= data_sistem('nama') ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
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
		$(document).ready(function() {
			$('.js_select2').select2({
				width: '100%'
			});
		});

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
                        jQuery(ee).removeClass('is-invalid').addClass('is-valid');
                        jQuery(e).remove();
                    },
                    rules: {
                        re_password: {
                            required: true,
                            equalTo: '#password'
                        }
                    },
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

            Swal.fire({
                title: 'Daftar Akun ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: URL + 'login/do_submit_registrasi',
                        type: "POST",
                        data: data,
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        beforeSend: function(res) {
                            Swal.fire({
                                title: 'Loading ...',
                                html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                        },
                        error: function(e) {
                            Swal.close();
                            toastr.error('gagal, terjadi kesalahan', {
                                timeOut: 1000,
                                fadeOut: 1000
                            });
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                        icon: 'success',
                                        title: data.msg,
                                        showConfirmButton: true,
                                    })
                                    .then(() => {
                                        location.href = data.link;
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: data.msg,
                                    showConfirmButton: true,
                                })
                            }
                        },
                    });
                }
            })
        }

		function pilih_kecamatan(dt) {
			$.ajax({
				type: "POST",
				url: "<?= base_url('global/profil/get_kelurahan') ?>",
				data: {
					id_kec: $(dt).val(),
				},
				dataType: "JSON",
				success: function(res) {
					if (res.status == 'success') {
						var html = '<option value=""></option>';
						$.map(res.data, function(e, i) {
							html += `
								<option value="${e.kode_wilayah}">${e.nama}</option>
						`;
						});
						$('#select_kelurahan').html(html);
					} else {
						toastr.error('Gagal');
					}
				}
			});
		}
    </script>
</body>

</html>
