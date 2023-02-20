<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 500,
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "<?php echo base_url('admin/page/upload_image') ?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#summernote').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: "<?php echo base_url('admin/page/delete_image') ?>",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

    function do_submit(dt) {

        Swal.fire({
            title: 'Simpan Perubahan ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                var deskripsi = $('#summernote').summernote('code');
                var formData = new FormData(dt);
                formData.append('konten', deskripsi);

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/page/do_submit') ?>",
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
                                    $('#table_data').DataTable().ajax.reload();
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