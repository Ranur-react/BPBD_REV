<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-warning" onclick="location.href = ('<?php echo site_url('user/index') ?>')">
                        <i class="fa fa-backward"></i> Kembali
                    </button>
                </h3>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo form_open('user/update', array('class' => 'form-horizontal')) ?>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-sm-3">ID</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="userid" class="form-control" disabled value="<?php echo $userid;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('userid') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Username</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="username" class="form-control"value="<?php echo $username;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('username') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Password</label>
                    <div class="col-sm-4"  style="width: 60%;">
                        <input type="text" name="userpassword" class="form-control"value="<?php echo $userpassword;?>">
                        <span style="font-weight: bold; color: red;"><?php echo form_error('userpassword') ?></span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3">Hak Akses</label>
                    <div class="col-md-8">
                    <select class="form-control select2" style="width: 60%;" name="userhakakses" value="<?php echo $userhakakses;?>">
                        <option selected="selected">==>Pilih<==</option>
                        <option>pusdalops</option>
                        <option>trc</option>
                        <option>pimpinan</option>
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
            </div>
            <?php echo form_close(); ?>
            <!-- /.col -->
        </div>
    </div>
</div>
<!-- /.row -->