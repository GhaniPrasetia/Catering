<style>
    .note-editor.note-frame .note-editing-area .note-codable,
    .note-editor.note-frame .note-editing-area .note-editable {
        color: #000;
    }
</style>

<div class="row" id="target_full_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary1 br-atas p-3 mb-0 d-flex justify-content-between">
                <h3 style="display: inline-block;" class="fw-600 mb-0"><i class="fas fa-info-circle mr-2"></i> <?= $title ?></h3>
                <a target="_blank" href="<?= base_url('admin/page/preview/' . encode_id(@$data->id)) ?>" class="btn btn-primary btn-rounded fw-600">
                    <i class="fa fa-eye mr-1"></i> Preview
                </a>
            </div>

            <div class="card-body">
                <form onsubmit="event.preventDefault();do_submit(this);">

                    <div class="form-group">
                        <label>Deskripsi Halaman</label>
                        <div id="summernote"><?= @$data->konten ?></div>
                    </div>

                    <input type="hidden" name="id" value="<?= encode_id(@$data->id) ?>">
                    <button type="submit" class="btn btn-block btn-rounded fw-600 btn-primary"><i class="fas fa-check"></i> KLIK DISINI UNTUK SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>