<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 500,
        });
    });

    function do_submit(dt) {

        Swal.fire({
            title: 'Simpan Menu ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                var deskripsi = $('#summernote').summernote('code');
                var formData = new FormData(dt);
                formData.append('deskripsi', deskripsi);

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/menu/do_submit_menu') ?>",
                    data: formData,
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
                                    location.href = "<?= base_url('admin/menu/list') ?>";
                                })
                        } else {
                            Swal.close();
                            toastr.error('format gambar tidak sesuai');
                        }
                    }
                });

            } else {
                return false;
            }
        })
    }
</script>