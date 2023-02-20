<h3><?= count($all) ?> Produk</h3>
<div class="table-responsive">
    <table class="table table-bordered table-sm" style="width: 100%;">
        <thead>
            <tr>
                <th>NO</th>
                <th>JENIS</th>
                <th>MENU</th>
                <th>QUANTITY</th>
                <th>HARGA SATUAN</th>
                <th>SUB TOTAL</th>
                <th>BATAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all as $i => $dt) : ?>
                <tr>
                    <td class="text-center"><?= $i + 1 ?></td>
                    <td><?= $dt->jenis ?></td>
                    <td><?= $dt->nama_menu ?></td>
                    <td><?= $dt->quantity ?></td>
                    <td><?= rupiah($dt->harga_menu) ?></td>
                    <td><?= rupiah($dt->quantity * $dt->harga_menu) ?></td>
                    <td class="text-center">
                        <button onclick="batalkan('<?= $dt->id ?>');" class="btn btn-danger btn-sm dw-600"><i class="fas fa-times"></i> Batalkan</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-600 text-right" colspan="5">Total</td>
                <td class="fw-600 text-left" colspan="2"><?= rupiah($total) ?></td>
            </tr>
        </tfoot>
    </table>

    <?php if (count($all) > 0) : ?>
        <button onclick="proses_pesanan();" class="btn btn-primary btn-rounded btn-block fw-600 mt-2"><i class="fa fa-check"></i> Klik Untuk Proses Pesanan</button>
    <?php endif; ?>
</div>