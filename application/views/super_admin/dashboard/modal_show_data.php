<div class="table-responsive">
    <table class="table table-bordered table-hover" id="tabel_show_data" style="width: 100%;">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Informasi</th>
                <th style="width:100px;">Alamat</th>
                <th>Foto Profil</th>
                <th style="width: 70px;">Pilih</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $index => $dt) : ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td>
                        <?= $dt->username ?>
                    </td>
                    <td>
                        <span class="badge badge-primary badge-sm"><?= $dt->nama ?></span>
                    </td>
                    <td>
                        <span class="text-primary fw-500"><?= $dt->no_hp ?></span>
                        <br>
                        <?= $dt->email ?>
                    </td>
                    <td>
                        <?= $dt->kelurahan ?>, <?= $dt->kecamatan ?>
                    </td>
                    <td>
                        <img src="<?= base_url($dt->foto) ?>" alt="foto profil" style="width: 75px;" class="img rounded rounded-circle">
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-primary w-100" href="<?= base_url('super_admin/dashboard/do_pilih_role/') . encode_id($dt->id) ?>">Pilih</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tabel_show_data').DataTable();
    });
</script>