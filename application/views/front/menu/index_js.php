<!-- bootstrap spin -->
<link href="<?= base_url('assets/skote/dist/') ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<script src="<?= base_url('assets/skote/dist/') ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

<script>
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-bottom-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    }

    $(document).ready(function() {
        load_all();
    });

    function load_all() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('menu/getAll') ?>",
            data: {},
            dataType: "JSON",
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading',
                    html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                });
            },
            complete: function() {
                Swal.close();
            },
            success: function(res) {
                if (res.status == 'success') {
                    $('#list_all').html(res.html);
                    $('.tooltip1').tooltip();
                }
            }
        });
    }

    function order(type, id) {
        var html = `
            <div class="form-group">
                <label>Quantity</label>
                <div style="" class="d-flex justify-content-between">
                    <button onclick="qty('kurang');" class="btn mr-1 btn-primary fw-600">-</button>
                    <input type="number" value="1" id="qty" class="form-control">
                    <button onclick="qty('tambah');" class="btn ml-1 btn-primary fw-600">+</button>
                </div>
            </div>
                    
            <div class="text-center">
                <button onclick="pesan_now('${type}','${id}');" class="btn ml-1 btn-primary fw-600 w-50">
                    <i class="fa fa-check"></i> Masukkan keranjang
                </button>
            </div>
        `;

        show_modal_custom({
            judul: 'Order',
            html: html,
            size: 'modal-md',
        });
    }

    function qty(type) {
        var now = $('#qty').val();
        now = parseInt(now);
        if (type == 'tambah') {
            $('#qty').val(now + 1);
        } else if (type == 'kurang') {
            if (now != 0) {
                $('#qty').val(now - 1);
            }
        }
    }

    function pesan_now(type, id) {
        var now = $('#qty').val();
        now = parseInt(now);

        if (now < 1) {
            Swal.fire({
                icon: 'warning',
                title: 'Quantity tidak boleh 0',
                showConfirmButton: true,
            });
            throw false;
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('menu/order') ?>",
            data: {
                type: type,
                id: id,
                qty: now,
            },
            dataType: "JSON",
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading',
                    html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                });
            },
            complete: function() {
                Swal.close();
            },
            success: function(res) {
                if (res.status == 'success') {
                    $('#modal_custom').modal('hide');
                    toastr.success('berhasil ditambahkan');
                }
            }
        });
    }

    function keranjang() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('menu/keranjang') ?>",
            dataType: "JSON",
            data: {},
            beforeSend: function(res) {
                Swal.fire({
                    title: 'Loading ...',
                    html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                });
            },
            complete: function(res) {
                Swal.close();
            },
            success: function(res) {
                if (res.status == 'success') {
                    show_modal_custom({
                        judul: 'Keranjang',
                        html: res.html,
                        size: 'modal-lg',
                    });
                }
            }
        });
    }

    function batalkan(id) {
        Swal.fire({
            title: 'Hapus Dari Keranjang ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('menu/batalkan') ?>",
                    data: {
                        id: id,
                    },
                    dataType: "JSON",
                    beforeSend: function(res) {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                        });
                    },
                    error: function(res) {
                        Swal.close();
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil dibatalkan',
                                    showConfirmButton: true,
                                })
                                .then(() => {
                                    keranjang();
                                });
                        }
                    }
                });
            } else {
                return false;
            }
        })
    }

    function proses_pesanan() {
        Swal.fire({
            title: 'Pesanan akan di proses ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('menu/proses_pesanan') ?>",
                    data: {
                        id: true,
                    },
                    dataType: "JSON",
                    beforeSend: function(res) {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<i style="font-size:25px;" class="fa fa-spinner fa-spin"></i>',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                        });
                    },
                    error: function(res) {
                        Swal.close();
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Pesanan Berhasil di proses',
                                    showConfirmButton: true,
                                })
                                .then(() => {
                                    location.reload();
                                });
                        }
                    }
                });
            } else {
                return false;
            }
        })
    }
</script>