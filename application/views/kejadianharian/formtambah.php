<script>   
 function ambil(kodekasus,waktukejadian,jenisbencana,lokasi,namakorong,namanagari,namakecamatan,regu,jumlahdanapenanggulangan,tindaklanjut,taksirankerugian)  
 {     
	$('#kodekasus').val(kodekasus);    
	$('#waktukejadian').val(waktukejadian);   
    $('#lokasi').val(lokasi);
    $('#jenisbencana').val(jenisbencana);    
    $('#namakorong').val(namakorong);     
    $('#namanagari').val(namanagari);     
    $('#namakecamatan').val(namakecamatan);     
    $('#regu').val(regu);     
    $('#jumlahdanapenanggulangan').val(jumlahdanapenanggulangan);
    $('#tindaklanjut').val(tindaklanjut);
    $('#taksirankerugian').val(taksirankerugian);
    $('#myModal').modal('hide');    
 } 
</script> 

<style type="text/css">
 .editor
{  
 display:none;   
} 
</style> 

<body>   
<div class="box-body">
    <?php echo $this->session->flashdata('pesan');?>    
    <form method="post" action="<?php echo site_url('kejadianharian/simpantransaksi')?>" id="tmb" onSubmit="return cetak();"> 
    <div class="col-xs-12">   
			<div class="box-body table-responsive">     
			<table class="table table-bordered">       
			<tr>
    			<tr>         
	    		<td>Kode Kejadian</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="kodekejadian" id="kodekejadian"></td>
        		<td>Tanggal Penanggulangan</td>         
	    		<td><div class="col-sm-114"><input type="date" class="form-control" name="tanggal" id="tanggal"></td>
    			</tr>
			</tr>
			<tr>
    			<tr>         
        		<td>Cuaca</td>         
	    		<td width="100"><div class="col-sm-114"><input type="text" class="form-control" name="cuaca" id="cuaca"></td>
        		<td>Suhu (0c)</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="suhu" id="suhu"></td>
                <td>Kelembaban</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="kelembaban" id="kelembaban"></td>
        		<td>Kencang Angin</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="kencangangin" id="kencangangin"></td>
                <td>Arah Angin</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="arahangin" id="arahangin"></td>
                </tr>
			</tr>
			</tr>
 			</table>    
 			</div>  
 		</div>

         <div class="col-xs-12">   
			<div class="box-body table-responsive">     
			<table class="table table-bordered">       
			<tr>
    			<tr>         
	    		<td>Kode Kasus</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="kodekasus" id="kodekasus"></td>
                <td><button type="button" title="Cari Kasus" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-search'>
            </span>
            </button>        
 	        </td>
        		<td>Lokasi</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="lokasi" id="lokasi"></td>
			</tr>
			<tr>
    			<tr>         
        		<td>Waktu Kejadian</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="waktukejadian" id="waktukejadian"></td>
        		<td>Korong</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="namakorong" id="namakorong"></td>
    			</tr>
			</tr>
			<tr>
    			<tr>         
        		<td>Jenis Bencana</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="jenisbencana" id="jenisbencana"></td>
        		<td>Nagari</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="namanagari" id="namanagari"></td>
    			</tr>
			</tr>
			<tr>
            <td>Kecamatan</td>         
	    	<td><div class="col-sm-114"><input type="text" class="form-control" name="namakecamatan" id="namakecamatan"></td>	
    		</tr>
			</tr>
 			</table>    
 			</div>  
 		</div>
         <div class="col-xs-12">   
			<div class="box-body table-responsive">     
			<table class="table table-bordered">       
			<tr>
    			<tr>         
	    		<td>Tim Regu Penanggulangan</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="regu" id="regu"></td>
        		<td>Tindak Lanjut</td>         
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="tindaklanjut" id="tindaklanjut"></td>
			</tr>
			<tr>
    			<tr>         
        		<td>Jumlah Dana Penanggulangan</td>         
	    		<td width="100"><div class="col-sm-114"><input type="text" class="form-control" name="jumlahdanapenanggulangan" id="jumlahdanapenanggulangan"></td>
        		<td>Taksiran Kerugian</td>         
	    		<td ><div class="col-sm-114"><input type="text" class="form-control" name="taksirankerugian" id="taksirankerugian"></td>
    			</tr>
			</tr>
			</tr>
 			</table>    
 			</div>  
 		</div>

         <div class="col-xs-12">   
			<div class="box-body table-responsive">     
			<table class="table table-bordered">       
			<tr>
    			<tr>         
	    		<td>Peringatan Dini dan Informasi</td>         
	    		<td><div class="col-sm-114"><input type="textarea" class="form-control" name="peringatandini" id="peringatandini"></td>
        		</tr>
			</tr>
 			</table>    
 			</div>  
 		</div>
         <tr>          
    <td colspan="5">               
	<button type="submit" class="btn btn-primary btn-sm"><span class='glyphicon glyphiconfloppy-save'></span> Simpan Transaksi</button>        
    <a class='btn btn-danger btn-sm' title='Hapus Data' href='<?php echo site_url('kejadianharian/index')?>' onClick="return confirm('Anda Yakin menghapus data ini?')"><span class='fa fa-ban'> Batal Transaksi</span></a>        
    </td>
    </tr>
    </form> 
</div> 
</body>

<!-- Modal -->   
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" arialabelledby="myModalLabel">     
<div class="modal-dialog modal-lg" role="document">  
     <div class="modal-content">     
    <div class="modal-header">        
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span ariahidden="true">&times;	
</span>	
</button>          
 <h4 class="modal-title" id="myModalLabel">Cari Data Kasus Bencana</h4>         
  <div class="box-body table-responsive">         
  <table class="table table-bordered table-striped table-hover" id="datatiket">      
       <thead>
<tr>                
<th width="5">No</th>         
    <th>Kode Kasus</th>        
    <th>Tanggal Terjadi</th>  
  	<th>Waktu Terjadi</th>                
	<th>Jenis Bencana</th>
  	<th>Lokasi</th>                
	<th>Nama Korong</th>    
	<th>Nama Nagari</th>
	<th>Nama Kecamatan</th>    
    <th>Regu</th>
    <th>Jumlah Dana Penanggulangan</th>
    <th>Tindak Lanjut</th>
    <th>Taksiran Kerugian</th>
    <th>Aksi</th>       
</tr>             
</thead>   
                  
 <tbody>            
 <?php $no=1;foreach($datakasusbencana->result_array() as $r){?>             
  <tr>                
  <td><?php echo $no ?></td>              
  <td><?php echo $r['kodekasus'] ?></td>        
  <td><?php echo $r['tglkejadian'] ?></td>  
  <td><?php echo $r['waktukejadian'] ?></td>               
  <td><?php echo $r['jenisbencana'] ?></td>
  <td><?php echo $r['lokasi'] ?></td>    
  <td><?php echo $r['namakorong'] ?></td>    
  <td><?php echo $r['namanagari'] ?></td>
  <td><?php echo $r['namakecamatan'] ?></td> 
  <td><?php echo $r['regu'] ?></td>
  <td><?php echo $r['jumlahdanapenanggulangan'] ?></td>
  <td><?php echo $r['tindaklanjut'] ?></td>
  <td><?php echo $r['taksirankerugian'] ?></td>              
  <td><button class="btn btn-primary btn-xs" type="button" onClick="return ambil('<?php echo $r['kodekasus']?>','<?php echo $r['waktukejadian']?>','<?php echo $r['jenisbencana']?>','<?php echo $r['lokasi']?>','<?php echo $r['namakorong']?>','<?php echo $r['namanagari']?>','<?php echo $r['namakecamatan']?>','<?php echo $r['regu']?>','<?php echo $r['jumlahdanapenanggulangan']?>','<?php echo $r['tindaklanjut']?>','<?php echo $r['taksirankerugian']?>')"><span class='glyphicon glyphicon-check'>
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