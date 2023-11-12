<div class="row px-4">
    <?php foreach ($all as $key) : ?>
        <?php $get_data = get_detail_pesanan($key->id); ?>
        <div class="col-md-12">
            <div class="card rounded border border-warning bg_custom">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>TOTAL PRODUK <?= count($get_data['all']) ?></h3>
                        <span class="fw-600 text-primary">
                            <i class="far fa-clock"></i> <?= date('d/m/Y H:i') ?>
                        </span>
                    </div>

					<?php
						$id_user = $key->id_user;
						echo "Nama: " . ($id_user == 0 ? '---' : $key->nama);
					?>
	
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_data['all'] as $i => $dt) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td><?= $dt->jenis ?></td>
                                        <td><?= $dt->nama_menu ?></td>
                                        <td><?= $dt->quantity ?></td>
                                        <td><?= rupiah($dt->harga_menu) ?></td>
                                        <td><?= rupiah($dt->quantity * $dt->harga_menu) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="fw-600 text-right" colspan="5">Total</td>
                                    <td class="fw-600 text-left" colspan="2"><?= rupiah($get_data['total']) ?></td>
                                </tr>
                            </tfoot>
                        </table>

                        <?php if ($status == 1) : ?>
                            <button onclick="update_status('<?= $key->id ?>','5', 'Batalkan Pesanan');" class="btn fw-600 btn-light">BATALKAN</button>
                            <button onclick="update_status('<?= $key->id ?>','2', 'Proses Pesanan');" class="btn fw-600 btn-light">PROSES</button>
                        <?php elseif ($status == 2) : ?>
                            <button onclick="update_status('<?= $key->id ?>','3','Pesanan Sudah Selesai');" class="btn fw-600 btn-warning"><i class="fa fa-check"></i> SELESAI</button>
                            <button onclick="update_status('<?= $key->id ?>','5', 'Batalkan Pesanan');" class="btn fw-600 btn-light">BATALKAN</button>
                        <?php endif; ?>
                        <?php if (in_array($status, [2, 3])) : ?>
                            <button onclick="window.open('<?= base_url($key->bukti_bayar) ?>');" class="btn fw-600 btn-primary"><i class="fa fa-image"></i> LIHAT BUKTI BAYAR</button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php if (empty($all)) : ?>
    <h4 class="text-center my-4">belum ada pesanan</h4>
<?php endif; ?>
