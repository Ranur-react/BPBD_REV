<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('daerahrawan/index') ?>')"id="tmb" onSubmit="return cetak()";>
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('daerahrawan/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode Daerah Rawan</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodedaerahrawan" class="form-control" value="<?php echo $kodedaerahrawan;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodedaerahrawan') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama Daerah / Korong</label>
                    <div class="col-sm-4"  style="width: 60%;">
                    <select class="form-control select2" style="width: 100%;" name="dkodekorong" id="dkodekorong" value="<?php echo $namakorong;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datakorong->result_array() as $k){?>             
	                <option value="<?php echo $k['kodekorong']?>"><?php echo $k['namakorong']?></option>             
                    <?php }?>             
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama Nagari</label>
                    <div class="col-sm-4" style="width:60%">
                    <select class="form-control select2" style="width: 100%;" name="dkodenagari" id="dkodenagari" value="<?php echo $namanagari;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datakorong->result_array() as $k){?>             
	                <option value="<?php echo $k['kode_nagari']?>"><?php echo $k['namanagari']?></option>             
                    <?php }?>             
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama Kecamatan</label>
                    <div class="col-sm-4" style="width:60%">
                    <select class="form-control select2" style="width: 100%;" name="dkodekecamatan" id="dkodekecamatan" value="<?php echo $namakecamatan;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datakorong->result_array() as $k){?>             
	                <option value="<?php echo $k['kd_kecamatan']?>"><?php echo $k['namakecamatan']?></option>             
                    <?php }?>             
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Jenis Bencana</label>
                    <div class="col-sm-4" style="width:60%">
                    <select class="form-control select2" style="width: 100%;" name="dkodejenisbencana" id="dkodejenisbencana" value="<?php echo $jenisbencana;?>" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datajenisbencana->result_array() as $k){?>             
	                <option value="<?php echo $k['kodejenis']?>"><?php echo $k['jenisbencana']?></option>             
                    <?php }?>             
                    </select>
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