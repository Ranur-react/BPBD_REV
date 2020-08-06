<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong class="card-title">
<?php echo anchor('user/index', 'Kembali', array('class' => 'btn btn-
warning')) ?>
</strong>
</div>
<div class="card-body">
<?php echo $this->session->flashdata('pesan'); ?>
<?php echo form_open_multipart('user/doupload') ?>
<div class="row form-group">
<div class="col col-md-2">
<label class="form-control-label">User</label>
</div>
<div class="col-12 col-md-4">
<input type="text" name="id" class="form-control" readonly 
value="<?php echo $id; ?>">                        
</div>
</div>
<div class="row form-group">
<div class="col col-md-2">
<label class="form-control-label">Upload Foto</label>
</div>
<div class="col-12 col-md-4">
<input type="file" name="uploadfoto">
</div>
</div>
<div class="row form-group">
<div class="col col-md-2">
<label class="form-control-label">Tampil Foto</label>
</div>
<div class="col-12 col-md-2">
<img class="img-fluid" src="<?php echo base_url($foto)?>" width="150" height="=50" alt="Belum Ada 
Gambar">
</div>
</div>
<div class="row form-group">
<div class="col col-md-2">
<button type="submit" class="btn btn-success">
<i class="fa fa-upload"></i> Upload Foto
</button>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>