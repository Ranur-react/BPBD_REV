<section class="content"> 
	<div class="box box-warning color-palette-box">         
		<div class="box-header with-border">           
			<h3 class="box-title"><i class="fa fa-tag"></i> Detail Kerusakan</h3>         
		</div>         
			<div class="box-body">           
				<div class="row">             
					<div class="col-sm-12 col-md-12">             
						<?php $d = $ambildatakerusakan->row_array();?>               
						<table>                
							<tr>
								<td width='150px'>Kode Kasus</td>
								<td width='10px'>:</td>
								<td><b><?php echo $d['kodekasus']; ?></b></td>
							</tr>                
							<tr>
								<td>Tanggal Kejadian</td>
								<td>:</td>
								<td><b><?php echo $d['tglkejadian']; ?></b></td>
							</tr>                
							<tr>
								<td>Waktu Kejadian</td>
								<td>:</td>
								<td><b><?php echo $d['waktukejadian']; ?></b></td>
							</tr> 
                            <tr>
								<td>Korong</td>
								<td>:</td>
								<td><b><?php echo $d['namakorong']; ?></b></td>
							</tr> 
                            <tr>
								<td>Nagari</td>
								<td>:</td>
								<td><b><?php echo $d['namanagari']; ?></b></td>
							</tr> 
                            <tr>
								<td>Kecamatan</td>
								<td>:</td>
								<td><b><?php echo $d['namakecamatan']; ?></b></td>
							</tr>
							<tr>
								<td>Taksiran Kerugian</td>
								<td>:</td>
								<td><b><?php echo $d['taksirankerugian']; ?></b></td>
							</tr>            
						</table>             
						<br> 
						<table id="data" class="table table-bordered"> 
							<thead>  
								<tr style="background-color: #2196F3;color: white;font-size: 12px">      
									<th width="5">No</th>                
									<th>Jenis Kerusakan</th>         
									<th>Jumlah Kerusakan</th>         
									<th>Keterangan Kerusakan</th>                       
									</tr> </thead> <tbody>      
										<?php $no=1; foreach($ambildatakerusakan->result_array() as $r){ ?>     
									<tr style="font-size: 12px;">      
										<td align="center"><?php echo $no?></td>         
										<td><?php echo $r['detjeniskerusakan']?></td>         
										<td><?php echo $r['detjumlah']?></td>         
										<td><?php echo $r['detketerangan']?></td>         
									</tr>     
									<?php $no++; }?>    
                                    </tbody> 
                        </table> 
                        <button type="button" onclick="location.href=('<?php echo site_url('kasusbencana/tambah')?>')" class="btn btn-danger btn-sm">
	                    <span class='fa fa-shopping-cart'></span>Kasus Baru</button> 
	                    <button type="submit" onclick="location.href=('<?php echo site_url('kasusbencana/index')?>')" class="btn btn-success btn-sm">
		                <span class='fa  fa-mail-reply-all'></span> Kembali</button>             
	                </div>             <!-- /.col -->           
                </div>           <!-- /.row -->         
            </div>         <!-- /.box-body -->       
    </div>
</section> 