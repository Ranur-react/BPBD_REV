<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('nagari/index') ?>')"id="tmb" onSubmit="return cetak()";>
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('nagari/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodenagari" class="form-control" value="<?php echo $kodenagari;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodenagari') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama Nagari</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="namanagari" class="form-control" value="<?php echo $namanagari;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namanagari') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Kecamatan</label>
                    <div class="col-sm-4" style="width:60%">
                    <select class="form-control select2" style="width: 100%;" name="kode_kecamatan" id="kode_kecamatan" value="<?php echo $namakecamatan;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datakecamatan->result_array() as $k){?>             
	                <option value="<?php echo $k['kodekecamatan']?>"><?php echo $k['namakecamatan']?></option>             
                    <?php }?>             
                    </select>
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