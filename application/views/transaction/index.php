<section class="content-header">
    <h1>
        Transaksi Pulsa
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaksi Pulsa</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <?= show_bootstrap_alert() ?>
            <div class="box">
                <div class="box-body">
                    <form class="form-horizontal" id="form_transaction" v-on:submit.prevent="process">
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Nomor Hp</label>
                            <div class="col-4 col-sm-4 col-lg-4">
                                <div class="input-group">
                                    <input type="text" name="phone_number" class="form-control" 
                                        v-model="phone_number" maxlength="12" v-on:blur="do_reset"/>
                                    <div class="input-group-addon" id="spinner" style="display:none;">
                                        <i class="fa fa-spinner" aria-hidden="true"></i>
                                    </div>                                    
                                    <div class="input-group-addon" v-if="operator_name !== null">{{operator_name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Nominal</label>
                            <div class="col-8 col-sm-8 col-lg-8">
                                <label v-for="nominal in nominals" style="padding-left: 5px;">
                                    <input type="radio" name="credit_nominal" v-bind:value="nominal" v-model="credit_nominal"/>{{nominal.nominal}}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-3 col-sm-3 col-lg-3 control-label">Harga</label>
                            <div class="col-6 col-sm-6 col-lg-6">
                                <p class="form-control-static">{{price}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-4 col-sm-4 col-lg-4">
                                <button type="submit" class="btn btn-success" id="btn-process">Proses</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_transaction">
                            <thead>
                                <th>Tanggal</th>
                                <th>Operator</th>
                                <th>Nomor Hp</th>
                                <th>Nominal</th>
                                <th>Harga</th>
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