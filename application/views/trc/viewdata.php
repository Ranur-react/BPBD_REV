<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('trc/tambah') ?>')">
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
                            <th>NIK</th>
                            <th>Nama trc</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>Bagian</th>
                            <th>Regu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 0;
                        foreach ($tampil->result_array() as $baris):
                            $nomor++;
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $baris['kodetrc']; ?></td>
                                <td><?php echo $baris['namatrc']; ?></td>
                                <td><?php echo $baris['tanggallahir']; ?></td>
                                <td><?php echo $baris['alamat']; ?></td>
                                <td><?php echo $baris['notelp']; ?></td>
                                <td><?php echo $baris['jeniskelamin'];?></td>
                                <td><?php echo $baris['pendidikanakhir']; ?></td>
                                <td><?php echo $baris['bagian']; ?></td>
                                <td><?php echo $baris['regu'];?></td>
                                <td>
                                    <button type="button" class="btn bg-purple" onclick="location.href = ('<?php echo site_url('trc/edit/' . $baris['kodetrc']) ?>')">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodetrc'] ?>')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <script>
                                        function hapus(kode) {
                                            pesan = confirm('Yakin data trc ini di hapus');
                                            if (pesan) {
                                                location.href = ('<?php echo site_url('trc/hapus/') ?>' + kode);
                                            } else
                                                return false;
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