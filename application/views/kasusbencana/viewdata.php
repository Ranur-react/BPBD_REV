<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-warning">
			<div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn btn-primary" title="Lihat Detail" onclick="location.href = ('<?php echo site_url('kasusbencana/tambah') ?>')">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </h3>
            </div>
			<div class="box-body table-responsive">
					<table id="data" class="table table-bordered table-stripped">
						<thead>
							<tr>
								<th width="5">No</th>
								<th>Kode Kasus</th>
								<th>Tanggal Kejadian</th>
								<th>Waktu Kejadian</th>
								<th>Jenis Bencana</th>
								<th>Korong</th>
								<th>Nagari</th>
								<th>Kecamatan</th>
								<th>Jml Korban</th>
								<th>Jml Kerusakan</th>
								<th>Regu Penanggulangan</th>
								<th>Jumlah Dana Penanggulangan</th>
								<th>Tindak Lanjut</th>
								<th>Taksiran Kerugian</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($tampil->result_array() as $r){
								?>
								<tr>
								<td align="center"><?php echo $no?></td>
								<td><?php echo $r['kodekasus'];?></a></td>
								<td><?php echo $r['tglkejadian'];?></td>
								<td><?php echo $r['waktukejadian'];?></a></td>
								<td><?php echo $r['jenisbencana'];?></a></td>
								<td><?php echo $r['namakorong'];?></a></td>
								<td><?php echo $r['namanagari'];?></a></td>
								<td><?php echo $r['namakecamatan'];?></a></td>
								<td><?php echo $r['korban'];?></a></td>
								<td><?php echo $r['rusak'];?></a></td>
								<td><?php echo $r['regu'];?></a></td>
								<td ><?php echo $r['jumlahdanapenanggulangan'];?></td>
								<td><?php echo $r['tindaklanjut'];?></a></td>
								<td><?php echo "Rp.".number_format($r['taksirankerugian']);?></td>
								<td align="center" width="=50px">
								<a class='btn btn-success btn-xs' title='Lihat Detail Kerusakkan' href='<?php echo Site_url('kasusbencana/detailkerusakan/'.$r['kodekasus'])?>'><i class="fa fa-ambulance"></i></a>
								<a class='btn btn-success btn-xs' title='Lihat Detail Korban' href='<?php echo Site_url('kasusbencana/detailkorban/'.$r['kodekasus'])?>'><i class="fa fa-exclamation-triangle "></i></a>
								</td></tr>
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