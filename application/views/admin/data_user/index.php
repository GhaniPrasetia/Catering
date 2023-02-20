<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2 btn-rounded float-right" onclick="tambah();">
            <i class="fa fa-plus"></i>
            Tambah User
        </button>
        <div style="clear: both;"></div>
    </div>
</div>
<div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;">
    <div class="row">
        <div class="col-md-6">
            <button style="border-radius:25px 25px 0 0;" onclick="load_table('<?= encode_id(2) ?>');set_radio(this,'select_type');" class="btn select_type p-2 active btn-outline-primary btn-lg fw-500 btn-block"><i class="fa fa-users"></i> Admin</button>
        </div>
        <div class="col-md-6">
            <button style="border-radius:25px 25px 0 0;" onclick="load_table('<?= encode_id(3) ?>');set_radio(this,'select_type');" class="btn select_type p-2 btn-outline-primary btn-lg fw-500 btn-block"><i class="fa fa-users"></i> User</button>
        </div>
    </div>
    <div class="card-body">

        <table class="mt-3 table table-striped" id="table_data">
            <thead>
                <tr>
                    <th class="fw-500">NO</th>
                    <th class="fw-500">NAMA</th>
                    <th class="fw-500">INFORMASI</th>
                    <th class="fw-500">ALAMAT</th>
                    <th class="fw-500">KECAMATAN</th>
                    <th class="fw-500">KELURAHAN</th>
                    <th class="fw-500" style="width:200px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>