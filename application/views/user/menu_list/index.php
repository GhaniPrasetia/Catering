<style>
    .oneLine {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>

<div class="row" id="target_full_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary1 br-atas p-3 mb-0 d-flex justify-content-between">
                <h3 style="display: inline-block;" class="fw-600 mb-0"><i class="fas fa-info-circle mr-2"></i> <?= $title ?></h3>
                <button class="btn btn-primary fw-600" onclick="keranjang();">
                    <span style="text-decoration: underline;">Keranjang</span>
                </button>
            </div>

            <div class="card-body" id="list_all">
            </div>
        </div>
    </div>
</div>