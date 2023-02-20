<div class="row mb-3">
    <div class="col-md-12">
        <h3 class="text-center">Pilih Role</h3>
        <p class="text-center">super admin dapat login sebagai role yang dipilih sesuai dengan akses yang terdaftar</p>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div onclick="show_data('admin','<?= encode_id(2) ?>');" class="out-box">
            <div class="outer btn bg-primary text-white shadow1">
                <div class="middle">
                    <div class="inner">
                        <i style="font-size: 30px;" class="fa fa-users"></i>
                        <span class="d-block" style="font-size: 25px;">ADMIN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div onclick="show_data('user','<?= encode_id(3) ?>');" class="out-box">
            <div class="outer btn bg-primary text-white shadow1">
                <div class="middle">
                    <div class="inner">
                        <i style="font-size: 30px;" class="fa fa-users"></i>
                        <span class="d-block" style="font-size: 25px;">USER</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>