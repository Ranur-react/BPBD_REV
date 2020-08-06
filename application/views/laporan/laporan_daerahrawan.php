
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<body onload="window.print()">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $judul?></title>
</head>
<br>
<br>

<div id="page-SP">
<table align="center" width="70%" style="border-collapse:collapse" border="1">
<tr><td><br>

	<table align="center" width="696" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="90" rowspan="3" align="once +++left"><img src="<?php echo base_url().'images/logobpbd.jpg'?>" height="64" width="70"></td>  
          <td width="516" height="30" align="center"><div align="center"><font color="black" face="Times New Roman" size="1"><b><h1>Pusat Pengendalian Operasi Penanggulangan Bencana <br>PUSDALOPS-PB KABUPATEN PADANG PARIAMAN <br>Komplek TK/SD Bertaraf Internasional VII Koto Sungai Sarik. Telp 0751 681216</h1></b></font>
		 </p>
          </div></td>
          <!--<td width="90" rowspan="3" align="center"><img src="http://localhost/WEB_Alumni_STMIK_AMIK_Jayanusa_Padang/assets1/avatars/logo.png" style="width:90px;height:90px"></td>
        -->
        </tr>
              </table>
   	<table align="center" width="97%" border="0">
		<tr><td colspan="5"><hr></td></tr>
		<tr>
			<td colspan="5" align="center"><h4>LAPORAN DAERAH RAWAN BENCANA</h4></td>
		</tr>

		<table  align="center" width="97%" style="border-collapse:collapse" border="1"><br>
			<thead>
			<tr> 
					<th colspan="6" style="text-align:left;">Jenis Bencana : <?php echo $jenisbencana;?></th> 
					</tr> 
				<tr>
					<th style="width: 30px;">No</th>         
					<th style="width: 130px">Nama Daerah Rawan</th>         
					<th style="width: 130px">Nama Nagari</th>         
					<th style="width: 120px">Nama Kecamatan</th>    
					<th style="width: 120px">Keterangan</th>
				</tr>
			</thead>
			<tbody> 
					<?php      
					$no=0;
					foreach($data->result_array() as $i) {                 
					$no++;     
						 ?><tr>         
							<td style="text-align: center;"><?php echo $no;?></td>         
							<td><?php echo $i['namakorong']?></td>         
							<td><?php echo $i['namanagari']?></td>         
							<td><?php echo $i['namakecamatan']?></td> 
							<td><?php echo $i['keterangan']?></td> 
							    
						</tr>     
					<?php } ?>
					</tbody> 
				</table> 
				<table align="center" style="width:990px; border:none;margin-top:5px;margin-bottom:20px;fontsize: 14px">     
					<tr>         
						<td align="right" &nbsp>Limpato, <?php echo date('d-M-Y')?></td>     
					</tr>     
					<tr>         
						<td align="right"></td>     
					</tr>         
					<tr>     
						<td><br/><br/><br/><br/></td>     
					</tr>         
					<tr>         
						<td align="right">OPERATOR PUSDALOPS</td>     
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
		</table>
	</table>
</br>
</td>
</tr>
</table>
</div>
</body>
</html>