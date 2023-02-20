<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #0c6061 !important;
        border: 1px solid #000 !important;
        color: #fff !important;
    }
</style>

<div class="row" id="target_full_page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary1 br-atas p-3 mb-0 d-flex justify-content-between">
                <h3 style="display: inline-block;" class="fw-600 mb-0"><i class="fas fa-info-circle mr-2"></i> <?= $title ?></h3>
                <button onclick="tambah();" class="btn btn-primary btn-rounded fw-500">
                    <i class="fa fa-plus mr-1"></i> Tambah Data
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="mt-3 table table-striped" id="table_data">
                        <thead>
                            <tr>
                                <th class="fw-500">NO</th>
                                <th class="fw-500">PAKETAN</th>
                                <th class="fw-500">LIST MENU</th>
                                <th class="fw-500">HARGA</th>
                                <th class="fw-500">KETERANGAN</th>
                                <th class="fw-500" style="width: 250px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>