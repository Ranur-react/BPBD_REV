<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-warning">
			<div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" title="Lihat Detail" onclick="location.href = ('<?php echo site_url('kejadianharian/tambah') ?>')">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </h3>
            </div>
			<div class="box-body table-responsive">
					<table id="data" class="table table-bordered table-stripped">
						<thead>
							<tr>
								<th width="5">No</th>
								<th>Kode Kejadian</th>
                                <th>Tanggal Kejadian</th>
								<th>Cuaca</th>
								<th>Suhu</th>
								<th>Kelembaban</th>
								<th>Kencang Angin</th>
								<th>Arah Angin</th>
								<th>Lokasi</th>
								<th>Peringatan Dini dan Informasi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($tampil->result_array() as $r){
								?>
								<tr>
								<td align="center"><?php echo $no?></td>
								<td><?php echo $r['kodekejadian'];?></a></td>
								<td><?php echo $r['tanggal'];?></td>
								<td><?php echo $r['cuaca'];?></a></td>
								<td><?php echo $r['suhu'];?></a></td>
								<td><?php echo $r['kelembaban'];?></a></td>
								<td><?php echo $r['kencangangin'];?></a></td>
								<td><?php echo $r['arahangin'];?></a></td>
								<td><?php echo $r['lokasi'];?></a></td>
								<td><?php echo $r['peringatandini'];?></td>
					            </tr>
								<?php $no++; }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(function(){
			$('#data').DataTable();
		});
	</script>