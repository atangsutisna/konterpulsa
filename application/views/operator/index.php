<section class="content-header">
    <h1>
        Operator
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Operator</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <?= show_bootstrap_alert() ?>
            <div class="box">
                <div class="box-body">
                    <p><a href="<?= site_url('operator/reg_form') ?>" class="btn btn-primary">Operator Baru</a></p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_operator">
                            <thead>
                                <th>Last update</th>
                                <th>Name</th>
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