<section class="content-header">
    <h1>
        Pulsa
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pulsa</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <?= show_bootstrap_alert() ?>
            <div class="box">
                <div class="box-body">
                    <p><a href="<?= site_url('credit/reg_form') ?>" class="btn btn-primary">Nominal Baru</a></p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_credit">
                            <thead>
                                <th>Tanggal</th>
                                <th>Operator</th>
                                <th>Nominal</th>
                                <th>Harga Provider</th>
                                <th>Harga Jual</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>