<style type="text/css">
 .editor
{  
 display:none;   
} 
</style> 

<body>   
	<div class="box-body">
	<?php echo $this->session->flashdata('pesan');?>
	<form method="post" action="<?php echo site_url('kasusbencana/simpantransaksi')?>" id="tmb" onSubmit="return cetak();">   
		<div class="col-xs-12">   
			<div class="box-body table-responsive">     
			<table class="table table-bordered">       
			<tr>
    			<tr>         
	    		<td>Kode Kasus</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="kodekasus" id="kodekasus"></td>
        		<td>Lokasi</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="lokasi" id="lokasi"></td>
        		<td>Tim Regu Penanggulangan</td>         
	    		<td><select class="form-control select2" style="width: 100%;" name="regutimpenanggulangan" id="regutimpenanggulangan" required>            
        		<option selected>-Pilih-</option>                 
        		<?php foreach($dataregutrc->result_array() as $k){?>             
	    		<option value="<?php echo $k['idregu']?>"><?php echo $k['regu']?></option>             
        		<?php }?>             
        		</select></td>
    			</tr>
			</tr>
			<tr>
    			<tr>         
        		<td>Tanggal Kejadian</td>         
	    		<td width="100"><div class="col-sm-114"><input type="date" class="form-control" name="tglkejadian"></td>
        		<td>Kecamatan</td>         
	    		<td><select class="form-control select2" style="width: 100%;" name="kkodekecamatan" id="kkodekecamatan" required>            
        		<option selected>-Pilih-</option>                 
        		<?php foreach($datakecamatan->result_array() as $k){?>             
	    		<option value="<?php echo $k['kodekecamatan']?>"><?php echo $k['namakecamatan']?></option>             
        		<?php }?>             
        		</select></td>
        		<td>Jumlah Dana Penanggulangan</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="jumlahdanapenanggulangan" id="jumlahdanapenanggulangan"></td>
    			</tr>
			</tr>
			<tr>
    			<tr>         
        		<td>Waktu Kejadian</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="waktukejadian"></td>
		        <td>Nagari</td>         
			    <td><select class="form-control select2" style="width: 100%;" name="kkodenagari" id="kkodenagari" required>            
        		<option selected>-Pilih-</option>                 
        		<?php foreach($datanagari->result_array() as $k){?>             
	    		<option value="<?php echo $k['kodenagari']?>"><?php echo $k['namanagari']?></option>             
        		<?php }?>             
        		</select></td>
        		<td>Tindak Lanjut</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="tindaklanjut" id="tindaklanjut"></td>
    			</tr>
			</tr>
			<tr>
    			<tr>         
        		<td>Jenis Bencana</td>         
	    		<td><select class="form-control select2" style="width: 100%;" name="kkodejenis" id="kkodejenis" required>            
        		<option selected>-Pilih-</option>                 
        		<?php foreach($datajenisbencana->result_array() as $k){?>             
	    		<option value="<?php echo $k['kodejenis']?>"><?php echo $k['jenisbencana']?></option>             
        		<?php }?>             
        		</select>   
	    		</td>
        		<td>Korong</td>         
	    		<td><select class="form-control select2" style="width: 100%;" name="kkodekorong" id="kkodekorong" required>            
        		<option selected>-Pilih-</option>                 
        		<?php foreach($datakorong->result_array() as $k){?>             
	    		<option value="<?php echo $k['kodekorong']?>"><?php echo $k['namakorong']?></option>             
        		<?php }?>             
        		</select></td>
    			</tr>
			</tr>
 			</table>    
 			</div>  
 		</div>

		<div class="col-xs-12">   
			<div class="box-body table-responsive">     
				<table class="table table-bordered">       
					<tr>         
						<td>Kode Korban</td>         
						<td width="100"><div class="col-sm-114"><input type="text" class="form-control" readonly name="kodekorban" id="kodekorban">
						<?php echo $this->session->flashdata('error');?></td>    
					 	<td><button type="button" title="Cari Korban" class="btn btn-primary" data-toggle="modal" data-target="#myModalkorban"><span class='glyphicon glyphicon-search'></span></button>        
 						</td>   
	     
 						<td>Nama Korban</td>         
						<td><input type="text" class="form-control" readonly name="namakorban" id="namakorban"></td>
	         
						<td>Jenis Kelamin</td>        
						<td><input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin"></td>

						<td>Umur</td>        
						<td><input type="text" class="form-control" name="umur" id="umur"></td> 
	       
					 	<td>Alamat</td>        
						<td><input type="text" class="form-control" name="alamat" id="alamat"></td>
					
						<td>Keterangan</td>         
						<td><input type="text" class="form-control" name="keterangan" id="keterangan"></td> 
	        
						<td><button type="button" id="tambah" class="btn btn-primary"><span class='glyphicon glyphicon-plus'></span></button></td>      
 					</tr>    
 				</table>    
 			</div>  
 		</div>   
		<div class="col-xs-12" id="data_sementara">     
			<div class="box-body table-responsive">       
				<table class="table table-bordered">         
				<thead>           
					<tr>             
					<th width="50" align="center">No</th>            
 					<th>Kode Korban</th>             
					<th>Nama Korban</th> 
					<th>Jenis Kelamin</th>  
					<th>Alamat</th>                         
 					<th>Keterangan</th>         
    				<th>Aksi</th>          
					</tr>       
				</thead>         
				<tbody>        
 				<?php $nomor=1; foreach($datatempkorban->result_array() as $d){ ?>          
 					<tr>            
 					<td align="center">
					<?php echo $nomor?>
					<input id="dataid" type="text" class="form-control editor" value="<?php echo $d['kodekorban']?>"/></td>             
					<td><?php echo $d['kodekorban'] ?></td>             
					<td><?php echo $d['namakorban'] ?></td>  
					<td><?php echo $d['jeniskelamin'] ?></td>
					<td><?php echo $d['alamat'] ?></td>      
					<td><?php echo $d['keterangan'] ?></td>
  					<td>              
 						<a class='btn btn-danger btn-xs' title='Hapus Item' href="<?php echo site_url('kasusbencana/hapusitemkorban/'.$d['kodekorban'])?>">
						<span class='glyphicon glyphicontrash'></span></a>            
					</td>          
					</tr>
					<?php $nomor++; } ?>       
  				</tbody>         
 			</div>     
		</div>
 	</form> 
  	</div> 
</body> 
<!-- Modal -->   
<div class="modal fade bs-example-modal-lg" id="myModalkorban" tabindex="-1" role="dialog" arialabelledby="myModalLabel">     
<div class="modal-dialog modal-lg" role="document">  
     <div class="modal-content">     
    <div class="modal-header">        
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span ariahidden="true">&times;	
</span>	
</button>          
 <h4 class="modal-title" id="myModalLabel">Cari Data Korban</h4>         
  <div class="box-body table-responsive">         
  <table class="table table-bordered table-striped table-hover" id="datatiket">      
       <thead>
<tr>                
<th width="5">No</th>         
    <th>Kode Korban</th>        
    <th>Nama Korban</th>                             
  	<th>Umur</th>                
	<th>Alamat</th>    
	<th>Jenis Kelamin</th>    
	<th>Keterangan</th>    
    <th>Aksi</th>       
</tr>             
</thead>   
                  
 <tbody>            
 <?php $no=1;foreach($datakorban->result_array() as $r){?>             
  <tr>                
  <td><?php echo $no ?></td>              
  <td><?php echo $r['kodekorban'] ?></td>                
  <td><?php echo $r['namakorban'] ?></td>                        
  <td><?php echo $r['umur']?></td>                
  <td><?php echo $r['alamat'] ?></td>               
  <td><?php echo $r['jeniskelamin'] ?></td>               
  <td><?php echo $r['keterangan'] ?></td>               
  <td><button class="btn btn-primary btn-xs" type="button" onClick="return ambil('<?php echo $r['kodekorban']?>','<?php echo $r['namakorban']?>','<?php echo $r['umur']?>','<?php echo $r['alamat']?>','<?php echo $r['jeniskelamin']?>','<?php echo $r['keterangan']?>')"><span class='glyphicon glyphicon-check'>
</span> Pilih</button> 
  </td>             
</tr>             
   <?php $no++; } ?>                  
 </tbody>           
 </table>          
 </div>      
 </div>       
</div>    
 </div> 
  </div> 
<!-- /Modal -->    