<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" onclick="location.href = ('<?php echo site_url('daerahrawan/tambah') ?>')">
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
                            <th>Kode Daerah Rawan</th>
                            <th>Nama Korong</th>
                            <th>Nama Nagari</th>
                            <th>Nama Kecamatan</th>
                            <th>Jenis Bencana</th>
                            <th>Keterangan</th>
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
                                <td><?php echo $baris['kodedaerahrawan']; ?></td>
                                <td><?php echo $baris['namakorong']; ?></td>
                                <td><?php echo $baris['namanagari'];?></td>
                                <td><?php echo $baris['namakecamatan']; ?></td>
                                <td><?php echo $baris['jenisbencana']; ?></td>
                                <td><?php echo $baris['keterangan']; ?></td>
                                <td>
                                    <button type="button" class="btn bg-purple" onclick="location.href = ('<?php echo site_url('daerahrawan/edit/' . $baris['kodedaerahrawan']) ?>')">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="return hapus('<?php echo $baris['kodedaerahrawan'] ?>')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <script>
                                        function hapus(kode) {
                                            pesan = confirm('Yakin data Daerah Rawan ini di hapus');
                                            if (pesan) {
                                                location.href = ('<?php echo site_url('daerahrawan/hapus/') ?>' + kode);
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