<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('trc/index') ?>')"id="tmb" onSubmit="return cetak()";>
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('trc/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodetrc" class="form-control" value="<?php echo $kodetrc;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodetrc') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama trc</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="namatrc" class="form-control" value="<?php echo $namatrc;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namatrc') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Tanggal Lahir</label>
                    <div class="col-sm-4">
                    <div class="input-group date "  style="width: 80%;">
                        <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="tanggallahir" class="form-control" value="<?php echo $tanggallahir;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('tanggallahir') ?></span>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Alamat</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('alamat') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">No Telp</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="notelp" class="form-control" value="<?php echo $notelp;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('notelp') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Jenis Kelamin</label>
                    <div class="col-md-8">
                    <select class="form-control select2" style="width: 60%;" name="jeniskelamin" value="<?php echo $jeniskelamin;?>">
                        <option selected="selected">==>Pilih<==</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                        <span style="font-weight: bold; color: red;"><?php echo form_error('jeniskelamin') ?></span>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Pendidikan Terakhir</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="pendidikanakhir" class="form-control" value="<?php echo $pendidikanakhir;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('pendidikanakhir') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Bagian</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="bagian" class="form-control" value="<?php echo $bagian;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('bagian') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Regu</label>
                    <div class="col-sm-4" style="width:60%">
                    <select class="form-control select2" style="width: 100%;" name="koderegu" id="koderegu" value="<?php echo $regu;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($dataregutrc->result_array() as $k){?>             
	                <option value="<?php echo $k['idregu']?>"><?php echo $k['regu']?></option>             
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