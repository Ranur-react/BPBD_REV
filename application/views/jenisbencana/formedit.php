<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('jenisbencana/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('jenisbencana/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode Jenis Bencana</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodejenis" class="form-control" value="<?php echo $kodejenis;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodejenis') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Jenis Bencana</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="jenisbencana" class="form-control"value="<?php echo $jenisbencana;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('jenisbencana') ?></span>
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