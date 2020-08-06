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
				<td align="center">Laporan Data Kejadian Harian dan Penanggulangan</td> 
			</tr> 
			<tr>     
				<td align="center">Pusat Pengendalian Operasi Penanggulangan Bencana</td> 
			</tr>   
			<tr> 
            <td align="center">PUSDALOPS-PB KABUPATEN PADANG PARIAMAN</td>
            <tr>    
			<td style="font-size: 12px;font-weight: italic;" align="center">Komplek TK/SD Bertaraf Internasional VII Koto Sungai Sarik. Telp 0751 681216</td> </tr>                 
			</table>
			<br><br><br>  
			<table border="0" align="center" style="width:990px;margin-bottom:10px;font-size: 14px"> 
				<thead>
				<tr> 
					<th colspan="6" style="text-align:left;">Tanggal Input : <?php echo date("d M Y",strtotime($awal));?> s/d <?php echo date("d M Y",strtotime($akhir));?></th> 
					</tr> 
					<tr>         
						<th>Kode Kejadian</th>
                        <th><?php echo $i['kodekejadian'] ?></th>         
						<th>Tim Penanggulangan</th>
                        <th>TRC</th>   
					</tr>
                    <tr>         
						<th>Tanggal Penanggulangan</th>
                        <th><?php echo $i['tanggal'] ?></th>                
						<th>Regu</th>
                        <th><?php echo $i['regu'] ?></th>            
					</tr>
                    <tr>         
						<th>Waktu Kejadian</th>
                        <th><?php echo $i['waktukejadian'] ?></th>         
						<th>Jenis Bencana</th>
                        <th><?php echo $i['jenisbencana'] ?></th>         
						</tr> 
				</thead>
                </table>
                <table border="1" align="center" style="width:990px;margin-bottom:10px;font-size: 14px"> 
				<tbody>  
                    <tr>
                    <th>Cuaca</th>
                    <th>Suhu (0c)</th>
                    <th>Kelembaban</th>
                    <th>Kencang Angin</th>
                    <th>Arah Angin</th>
                    </tr>
                    <tr>      
						<td><?php echo $i['cuaca'] ?></td>     
						<td><?php echo $i['suhu'] ?></td>
						<td><?php echo $i['kelembaban'] ?></td>
						<td><?php echo $i['kencangangin'] ?></td>
						<td><?php echo $i['arahangin'] ?></td>
					</tr>   	
					</tbody> 
				</table>
                <table border="1" align="center" style="width:990px;margin-bottom:10px;font-size: 14px"> 
				<tbody>  
                    <tr>
                    <th>Peringatan Dini</th>
                    </tr>
                    <tr>      
						<td><?php echo $i['peringatandini'] ?></td>     
					</tr>    	
					</tbody> 
				</table> 
                <table border="1" align="center" style="width:990px;margin-bottom:10px;font-size: 14px"> 
				<tbody>  
                <tr>         
						<th>Lokasi</th>
                        <th><?php echo $i['lokasi'] ?></th>         
						<th>Taksiran Kerugian</th>
                        <th><?php echo $i['taksirankerugian'] ?></th>   
					</tr>
                    <tr>         
						<th>Nama Korong</th>
                        <th><?php echo $i['namakorong'] ?></th>                
						<th>Jumlah Dana Penanggulangan</th>
                        <th><?php echo $i['jumlahdanapenanggulangan'] ?></th>            
					</tr>
                    <tr>         
						<th>Nama Nagari</th>
                        <th><?php echo $i['namanagari'] ?></th>         
						<th>Jenis Tindak Lanjut</th>
                        <th><?php echo $i['tindaklanjut'] ?></th>         
					</tr>
                    <tr>
                    <th>Keterangan</th>
                    <th><?php echo $i['keterangan'] ?></th>
                	
					</tbody> 
				</table>
				<table align="center" style="width:990px; border:none;margin-top:5px;margin-bottom:20px;fontsize: 14px">     
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