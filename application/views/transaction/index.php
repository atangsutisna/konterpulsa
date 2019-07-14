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
                    <form class="form-horizontal" id="form_filter">
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Phone Number</label>
                            <div class="col-4 col-sm-4 col-lg-4">
                                <div class="input-group">
                                    <input type="text" name="phone_number" class="form-control"/>
                                    <div class="input-group-addon">Axis</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Nominal</label>
                            <div class="col-3 col-sm-3 col-lg-3">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Price</label>
                            <div class="col-6 col-sm-6 col-lg-6">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-4 col-sm-4 col-lg-4">
                                <button type="submit" class="btn btn-success" id="btn-reset">Process</button>
                            </div>
                        </div>
                    </form>
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