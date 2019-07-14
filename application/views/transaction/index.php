<section class="content-header">
    <h1>
        Transaction
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaction</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <?= show_bootstrap_alert() ?>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_transaction">
                            <thead>
                                <th>Date</th>
                                <th>Operator Name</th>
                                <th>Phone number</th>
                                <th>Nominal</th>
                                <th>Price</th>
                                <th>Status</th>
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