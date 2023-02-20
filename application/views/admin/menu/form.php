<style>
    .note-editor.note-frame .note-editing-area .note-codable,
    .note-editor.note-frame .note-editing-area .note-editable {
        color: #000;
    }

    .note-btn-group.btn-group.note-insert {
        display: none !important;
    }
</style>

<div class="row" id="target_full_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary1 br-atas p-3 mb-0 d-flex justify-content-between">
                <h3 style="display: inline-block;" class="fw-600 mb-0"><i class="fas fa-info-circle mr-2"></i> <?= $title ?></h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form onsubmit="event.preventDefault();do_submit(this);" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" required name="nama" placeholder="Masukkan isian" class="form-control" value="<?= @$data->nama ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select required name="id_kategori" class="form-control js_select2" data-placeholder="pilih kategori">
                                        <option value=""></option>
                                        <?php foreach ($kategori as $dt) : ?>
                                            <option <?= $dt->id == @$data->id_kategori ? 'selected' : '' ?> value="<?= $dt->id ?>"><?= $dt->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" required name="harga" placeholder="Masukkan isian" class="form-control rupiah" autocomplete="off" value="<?= empty($data->harga) ? '' : rupiah($data->harga) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Foto Produk
                                <?php if (!empty($data->gambar)) : ?>
                                    <a class="font-weight-bold text-danger ml-1" href="<?= base_url($data->gambar) ?>" target="_blank">(* lihat file)</a>
                                <?php endif; ?>
                            </label>
                            <input type="file" <?= empty($data->gambar) ? 'required' : '' ?> accept="image/*" name="gambar">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div id="summernote"><?= @$data->deskripsi ?></div>
                        </div>

                        <input type="hidden" name="id" value="<?= encode_id(@$data->id) ?>">
                        <button type="submit" class="btn btn-block btn-rounded fw-600 btn-primary"><i class="fas fa-check"></i> KLIK DISINI UNTUK SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>