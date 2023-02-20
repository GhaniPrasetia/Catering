<script>
    function show_data(type, otoritas) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('super_admin/dashboard/show_data') ?>",
            data: {
                type: type,
                otoritas: otoritas,
            },
            dataType: 'JSON',
            success: function(res) {
                if (res.status == 'success') {                   
                    show_modal_custom({
                        judul: 'DATA ' + (type.toUpperCase()),
                        html: res.html,
                        size: 'modal-xl',
                    });
                }
            }
        });
    }
</script>