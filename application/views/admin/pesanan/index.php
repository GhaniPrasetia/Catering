<style>
    .bg_custom {
        background-color: #85FFBD;
background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);

    }
</style>

<div class="row" id="target_full_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary1 br-atas p-3 mb-0 d-flex justify-content-between">
                <h3 style="display: inline-block;" class="fw-600 mb-0"><i class="fas fa-info-circle mr-2"></i> <?= $title ?></h3>
                <a class="btn btn-primary btn-sm" href="<?= base_url('admin/export/pesanan') ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-print mr-1"></i> Export Rekap</a>
            </div>

            <div class="text-center my-3">
                <button onclick="load(1);set_radio(this,'tombol_load');" data-status="1" class="btn tombol_load btn-outline-primary active m-1 btn-rounded fw-600" style="width: 20%;">
                    <i class="fas fa-clipboard-list mr-1"></i> BELUM SELESAI
                </button>
                <button onclick="load(2);set_radio(this,'tombol_load');" data-status="2" class="btn tombol_load btn-outline-primary m-1 btn-rounded fw-600" style="width: 20%;">
                    <i class="fa fa-sync mr-1"></i> DI PROSES
                </button>
                <button onclick="load(3);set_radio(this,'tombol_load');" data-status="3" class="btn tombol_load btn-outline-primary m-1 btn-rounded fw-600" style="width: 20%;">
                    <i class="fa fa-check mr-1"></i> SELESAI
                </button>
                <button onclick="load('batal');set_radio(this,'tombol_load');" data-status="batal" class="btn tombol_load btn-outline-primary m-1 btn-rounded fw-600" style="width: 20%;">
                    <i class="fa fa-times mr-1"></i> DIBATALKAN
                </button>
            </div>

            <div id="list_all">

            </div>
        </div>
    </div>
</div>