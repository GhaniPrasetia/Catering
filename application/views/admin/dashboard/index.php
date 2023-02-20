<style>
    #chartdiv1,
    #chartdiv2 {
        width: 100%;
        height: 550px;
    }
</style>

<div class="row">

    <div class="col-md-3">
        <div class="card mini-stats-wid bg-soft-primary border border-primary">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div class="mr-3">
                        <p class="fw-600 mb-2">Total user</p>
                        <h5 class="mb-0"><?= $total_user ?></h5>
                    </div>
                    <div class="avatar-sm ml-auto">
                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mini-stats-wid bg-soft-primary border border-primary">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div class="mr-3">
                        <p class="fw-600 mb-2">Total Pesanan</p>
                        <h5 class="mb-0"><?= $pesanan->total ?></h5>
                    </div>
                    <div class="avatar-sm ml-auto">
                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mini-stats-wid bg-soft-primary border border-primary">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div class="mr-3">
                        <p class="fw-600 mb-2">Pesanan Selesai</p>
                        <h5 class="mb-0"><?= $pesanan->selesai ?></h5>
                    </div>
                    <div class="avatar-sm ml-auto">
                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mini-stats-wid bg-soft-primary border border-primary">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div class="mr-3">
                        <p class="fw-600 mb-2">Pesanan Dibatalkan</p>
                        <h5 class="mb-0"><?= $pesanan->batal ?></h5>
                    </div>
                    <div class="avatar-sm ml-auto">
                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row"> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Grafik</h3>
                <p class="text-center">Total Pendapatan Tahun 2023</p>
                <div id="chartdiv2"></div>
            </div>
        </div>
    </div>
</div>