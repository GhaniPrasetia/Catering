<form onsubmit="event.preventDefault();do_submit(this);">
    <div class="form-group">
        <label>Nama Paketan</label>
        <input type="text" required name="nama" autocomplete="off" placeholder="Masukkan isian" class="form-control" value="<?= @$data->nama ?>">
    </div>

    <div class="form-group">
        <label>Menu</label>
        <select required name="menu[]" class="form-control js_select2" data-placeholder="pilih menu" multiple>
            <option value=""></option>
            <?php foreach ($all as $dt) : ?>
                <option <?= in_array($dt->id, $data_menu) ? 'selected' : '' ?> value="<?= $dt->id ?>"><?= $dt->nama ?> - <?= rupiah($dt->harga) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="text" required name="harga" placeholder="Masukkan isian" class="form-control rupiah" autocomplete="off" value="<?= empty($data->harga) ? '' : rupiah($data->harga) ?>">
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" rows="5" placeholder="Tulis keterangan jika diperlukan" class="form-control"><?= @$data->keterangan ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?= encode_id(@$data->id) ?>">
    <button type="submit" class="btn btn-block btn-rounded fw-600 btn-primary"><i class="fas fa-check"></i> KLIK DISINI UNTUK SIMPAN</button>
</form>

<script>
    $(document).ready(function() {
        $('.js_select2').select2({
            width: '100%',
        });
    });

    function do_submit(dt) {

        Swal.fire({
            title: 'Simpan Paketan ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/paketan/do_submit') ?>",
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