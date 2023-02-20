<script>
    $(document).ready(function() {
        load(1);
    });

    function load(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('user/pesanan/load') ?>",
            data: {
                id: id,
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
                    $('#list_all').html(res.html)
                }
            }
        });
    }

    function update_status(id_pesanan, status, title) {
        Swal.fire({
            title: title,
            text: 'Apakah Anda Yakin ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user/pesanan/update_status') ?>",
                    data: {
                        id_pesanan: id_pesanan,
                        status: status,
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
                                    title: 'Berhasil disimpan',
                                    showConfirmButton: true,
                                })
                                .then(() => {
                                    var status = $('.tombol_load.active').data('status');
                                    load(status);
                                });
                        }
                    }
                });
            } else {
                return false;
            }
        })
    }

    function bayar_sekarang(id_pesanan) {
        var html = `
            <form onsubmit="event.preventDefault();do_submit(this);" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="d-block">Unggah bukti transfer</label>
                    <input type="file" required accept="image/*" name="gambar">
                </div>

                <input type="hidden" name="id" value="${id_pesanan}">
                <button type="submit" class="btn btn-block btn-rounded fw-600 btn-primary"><i class="fas fa-check"></i> KLIK DISINI UNTUK SIMPAN</button>
            </form>
        `;

        show_modal_custom({
            judul: 'Order',
            html: html,
            size: 'modal-md',
        });
    }

    function do_submit(dt) {

        Swal.fire({
            title: 'Unggah bukti transfer ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user/pesanan/do_submit_bukti') ?>",
                    data: new FormData(dt),
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
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
                            $('#modal_custom').modal('hide');
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Data berhasil disimpan',
                                    showConfirmButton: true,
                                })
                                .then(() => {
                                    var status = $('.tombol_load.active').data('status');
                                    load(status);
                                })
                        }
                    }
                });

            } else {
                return false;
            }
        })
    }
</script>