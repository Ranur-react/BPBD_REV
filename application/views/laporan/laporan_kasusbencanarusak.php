<html lang="en" moznomarginboxes mozdisallowselectionprint> 
<head>     
	<title><?php echo $judul?></title>     
	<meta charset="utf-8"> 
	<?php               
	foreach($data->result_array() as $i) 
	{    
	?>    
	<body onLoad="window.print()"> <div id="laporan" style='page-break-after:always'> 
		<table border="0" align="center" style="width:990px;margin-top:5px;border:none;marginbottom:0px;font-weight: bold;font-size: 16px"> 
			<tr>
				<td rowspan="4" align="center" style="width: 90px"><img src="<?php echo base_url().'images/logobpbd.jpg'?>" height="64" width="70"></td>     
				<td align="center">Laporan Data Kasus Bencana Berdasarkan Kerusakan</td> 
			</tr> 
			<tr>     
				<td align="center">Pusat Pengendalian Operasi Penanggulangan Bencana</td> 
			</tr>   
			<tr> 
            <td align="center">PUSDALOPS-PB KABUPATEN PADANG PARIAMAN</td>
            <tr>    
			<td style="font-size: 12px;font-weight: italic;" align="center">Komplek TK/SD Bertaraf Internasional VII Koto Sungai Sarik. Telp 0751 681216</td> </tr>                 
			</table>
			<br><br> 
			<table border="1" align="center" style="width:990px;margin-bottom:10px;font-size: 14px"> 
					<tr> 
					<th colspan="6" style="text-align:left;">Tanggal Input : <?php echo date("d M Y",strtotime($awal));?> s/d <?php echo date("d M Y",strtotime($akhir));?></th> 
					</tr>
					<tr>         
						<th>Kode Kasus</th>
                        <td><?php echo $i['kodekasus'] ?></td>            
						<th>Lokasi</th>
                        <td><?php echo $i['lokasi'] ?></td>            
						<th>Taksiran Kerugian</th>
                        <td><?php echo $i['taksirankerugian'] ?></td>            
					</tr>
                    <tr>         
						<th>Tanggal Kejadian</th>
                        <td><?php echo $i['tglkejadian'] ?></td>            						
						<th>Nama Kecamatan</th>
                        <td><?php echo $i['namakecamatan'] ?></td>            
						<th>Regu</th>
                        <td><?php echo $i['regu'] ?></td>            
					</tr>
                    <tr>         
						<th>Waktu</th>
                        <td><?php echo $i['waktukejadian'] ?></td>            
						<th>Nama Nagari</th>
                        <td><?php echo $i['namanagari'] ?></td>            
						<th rowspan="2">Tindak Lanjut</th>
                        <td rowspan="2"><?php echo $i['tindaklanjut'] ?></td>            
					</tr>
                    <tr>         
						<th>Jenis Bencana</th>
                        <td><?php echo $i['jenisbencana'] ?></td>                      
						<th>Nama Korong</th>
                        <td><?php echo $i['namakorong'] ?></td>            
						       
					</tr>
				<tr>
                    <th colspan="3">Jenis Kerusakan </th>
					<th colspan="3"> Keterangan </th>
					</tr>
					<tr>
					<td colspan="3" align="center"><?php echo $i['detjeniskerusakan'] ?></td>
					<td colspan="3" align="center"><?php echo $i['detketerangan'] ?></td>     
					</tr>					
			
				
				</table> 
				<br><br><br><br>
				<table align="center" style="width:990px;border:none;margin-top:5px;margin-bottom:20px;fontsize: 14px">     
					<tr>         
						<td align="center">Diketahui Oleh</td>
						<td align="center">Diketahui Oleh</td>
						<td align="center">Diketahui Oleh</td>     
					</tr>
					<tr>
					<td align="center">Kepala Pelaksana BPBD Kabupaten</td>
					<td align="center">Manager PUSDALOPS PB Kabupaten</td>
					<td align="center">Assisten Manajer PUSDALOPS</td>
					</tr>
					<tr>
					<td align="center">Padang Pariaman</td>
					<td align="center">Padang Pariaman</td>
					<td align="center">PB Kabupaten Padang Pariaman</td>
					</tr>
					<tr>         
						<td align="right"></td>     
					</tr>         
					<tr>     
						<td><br/><br/><br/><br/></td>     
					</tr>         
					<tr>         
						<td align="center">Budi Mulya,ST,M.Eng</td>     
						<td align="center">Edison,S.Sos</td>     
						<td align="center">Lidarnis</td>     
					</tr>
					<tr>         
						<td align="center">NIP. 19770702 200501 1 005</td>     
						<td align="center">NIP. 19670603 198903 1 007</td>     
						<td align="center">NIP. 19621111 198603 1 010</td>     
					</tr>      
					<tr>         
						<td align="center"></td>     
					</tr> </table> <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">     
						<tr>         
							<th><br/><br/></th>     
						</tr>     
						<tr>         
							<th align="left"></th>     
						</tr> 

					</table> 
				</div> 
			</body>
<?php }?>				
			</html> 