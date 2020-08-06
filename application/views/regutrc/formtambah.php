<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('regutrc/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('regutrc/simpan', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">ID Regu</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="idregu" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('idregu') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Regu</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="regu" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('regu') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan Data
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!-- /.col -->
        </div>
    </div>
</div>
<!-- /.row -->