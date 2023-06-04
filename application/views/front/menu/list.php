<h3>Total <?= count($all) ?> Produk</h3>
<div class="row">

    <?php foreach ($all as $item) : ?>
        <div class="col-md-3 mb-2">
            <div class="card">
                <div class="card-body p-2">
                    <div onclick="window.open('<?= base_url($item->gambar) ?>');" class="rounded" style="background-image: url('<?= base_url($item->gambar) ?>');width: 100%;height: 150px;background-size: cover;cursor: zoom-in;position: relative;">
                        <span style="position: absolute;top: 0;right: 0;" class="m-1 badge badge-pill badge-warning"><?= $item->kategori ?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <span data-toggle="tooltip" data-placement="top" title="<?= $item->nama ?>" class="oneLine tooltip1 fw-600 h5 mb-4 d-block"><?= $item->nama ?></span>
                    <div class="d-flex justify-content-between" style="align-items: center;">
                        <span>Rp. <?= rupiah($item->harga) ?></span>
                        <button onclick="order('menu','<?= $item->id ?>');" class="btn btn-primary btn-sm dw-600"><i class="fas fa-cart-plus"></i> Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<hr>

<h3>Total <?= count($all_paketan) ?> Menu Paketan</h3>
<div class="table-responsive">
    <table class="table table-bordered table-sm" style="width: 100%;">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PAKET</th>
                <th>ISI MENU</th>
                <th>HARGA</th>
                <th>KETERANGAN</th>
                <th>PESAN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_paketan as $i => $dt) : ?>
                <tr>
                    <td class="text-center"><?= $i + 1 ?></td>
                    <td><?= $dt->nama ?></td>
                    <td><?= $dt->list ?></td>
                    <td><?= rupiah($dt->harga) ?></td>
                    <td><?= $dt->keterangan ?></td>
                    <td class="text-center">
                        <button onclick="order('paketan','<?= $dt->id ?>');" class="btn btn-primary btn-sm dw-600"><i class="fas fa-cart-plus"></i> Pesan</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>