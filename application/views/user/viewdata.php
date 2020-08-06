<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('user/tambah') ?>')">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </h3>
            </div>
			
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Username</th>
							<th>Password</th>
                            <th>Hak Akses</th>
							<th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 0;
                        foreach ($tampildata->result_array() as $baris):
                            $nomor++;
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $baris['userid']; ?></td>
                                <td><?php echo $baris['username']; ?></td>
								<td><?php echo $baris['userpassword']; ?></td>
                                <td><?php echo $baris['userhakakses']; ?></td>
								<td>
                                    <button type="button" class="btn bg-purple" onclick="location.href = ('<?php echo site_url('user/edit/' . $baris['userid']) ?>')">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['userid'] ?>')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <button type="button" class="btn btn-success"onclick="return uploadfoto('<?php echo $baris['userid']?>');"title="Upload Foto">
                                                <i class="fa fa-image"></i>
                                            </button>
                                    <script>
                                        function hapus(kode) {
                                            pesan = confirm('Yakin data user ini di hapus');
                                            if (pesan) {
                                                location.href = ('<?php echo site_url('user/hapus/') ?>' + kode);
                                            } else
                                                return false;
                                        }
                                        function uploadfoto(id){
                                                        location.href=('<?php echo site_url('user/uploadfoto/')?>' +userid);
                                                }
                                    </script>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
	$('#data').DataTable();
	});
	</script>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">