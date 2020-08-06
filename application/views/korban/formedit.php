<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('korban/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('korban/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode korban</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodekorban" class="form-control" value="<?php echo $kodekorban;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodekorban') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama korban</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="namakorban" class="form-control" value="<?php echo $namakorban;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namakorban') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Umur</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="umur" class="form-control"value="<?php echo $umur;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('umur') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Alamat</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="alamat" class="form-control"value="<?php echo $alamat;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('alamat') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-4"  style="width: 60%;">
                    <label>
                    <input type="radio" name="jeniskelamin" class="minimal" value="Laki-Laki"checked> Laki-Laki
                    </label>&emsp;
                    <label>
                    <input type="radio" name="jeniskelamin" class="minimal" value="Perempuan">Perempuan
                    </label>
                        <span style="font-weight: bold; color: red;"><?php echo form_error('jeniskelamin') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Keterangan</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('keterangan') ?></span>
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