<section class="content-header">
    <h1>
        Operator
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('operator') ?>">Operator</a></li>
        <li class="active">Tambah Operator</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <?= show_bootstrap_alert() ?>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Operator</h3>
                </div>
                <div class="box-body">
                    <form role="form" method="post" action="<?= $form_action ?>" class="form-horizontal"> 
                        <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Nama</label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="name" 
                                    class="form-control" value="<?= set_value('name', isset($operator) ? $operator->name : '') ?>"/>
                                <?= form_error('name') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Prefix</label>
                            <div class="col-lg-5 col-sm-5">
                                <input type="text" name="prefix" 
                                    class="form-control" value="<?= set_value('name', isset($operator) ? $operator->prefix : '') ?>"/>
                                <?= form_error('prefix') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-sm-offset-3" style="margin-left: 26.5%;">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?= anchor('operator', 'Kembali', ['class' => 'btn btn-default']) ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>