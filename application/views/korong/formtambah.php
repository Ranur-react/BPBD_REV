<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('korong/index') ?>')"id="tmb" onSubmit="return cetak()";>
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('korong/simpantransaksi', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">Kode Korong</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="kodekorong" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('kodekorong') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nama Korong</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="namakorong" class="form-control">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('namakorong') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Kecamatan</label>
                    <div class="col-sm-4" style="width:60%">
                        <select class="form-control kd_kecamatan" style="width: 100%;" name="kd_kecamatan" id="kd_kecamatan" required>            
                            <option selected>-Pilih-</option>                 
                            <?php foreach($datakecamatan->result_array() as $k){?>             
        	                <option value="<?php echo $k['kodekecamatan']?>"><?php echo $k['namakecamatan']?></option>             
                            <?php }?>             
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Nagari</label>
                        <div class="col-sm-4 tampil_combo" style="width:60%">
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

<script type="text/javascript">
    $(document).ready( function(e) {
        let kode= "&a=" +$('.kd_kecamatan').val();
              $.ajax({
                    url: '<?= site_url('korong/combo_tambah_nagari')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                        // alert("Golongan harus dipilih");
                        $('.tampil_combo').html('');
                        $('.tampil_combo').html(response);
                    }
                });

        $(document).on('change', '.kd_kecamatan', function(e) {
        let kode= "&a=" +$('.kd_kecamatan').val();
              $.ajax({
                    url: '<?= site_url('korong/combo_tambah_nagari')  ?>',
                    type: "post",
                    data: kode,
                    cache: false,
                    success: function(response) {
                        // alert("Golongan harus dipilih");
                        $('.tampil_combo').html('');
                        $('.tampil_combo').html(response);
                    }
                });

    });

    });

</script>