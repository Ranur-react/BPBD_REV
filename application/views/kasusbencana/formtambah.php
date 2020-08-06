<script>
    let tampiltemp_korban=()=>{
      $.ajax({
        url: "<?php echo site_url('kasusbencana/tampilaplikasi')?>",
        success:function(msg){
                $('.tampil_korban').html('');
                $('.tampil_korban').html(msg);
          // location.href=('<?php echo site_url('kasusbencana/tambah')?>');
        }
      });
  }
    let tampiltemp_kerusakan=()=>{
      $.ajax({
        url: "<?php echo site_url('kasusbencana/tampil_kerusakana')?>",
        success:function(msg){
                $('.tampil_kerusakan').html('');
                $('.tampil_kerusakan').html(msg);
          // location.href=('<?php echo site_url('kasusbencana/tambah')?>');
        }
      });
  }
let  hapustemp_kerusakan=(val)=>{
    let value=val;
      $.ajax({
        url: "<?php echo site_url('kasusbencana/hapusitemkerusakan/')?>"+value,
        type: "POST",
        cache:false,
        success:function(msg){
            tampiltemp_kerusakan();

        }
      });
}
let  hapustempkorban=(val)=>{
    let value=val;
      $.ajax({
        url: "<?php echo site_url('kasusbencana/hapusitemkorban/')?>"+value,
        type: "POST",
        cache:false,
        success:function(msg){
          tampiltemp_korban();
        }
      });
}
  $(document).ready(function(e){
    tampiltemp_korban();
    tampiltemp_kerusakan();
    $('#tambah').click(function(e){
      var kodekorban=$('#kodekorban').val();
      var namakorban=$('#namakorban').val();
      var alamat=$('#alamat').val();
      var jeniskelamin=$('#jeniskelamin').val();
      var keterangan=$('#keterangan').val();
      datanya="&kodekorban="+kodekorban+"&namakorban="+namakorban+"&alamat="+alamat+"&jeniskelamin="+jeniskelamin+"&keterangan="+keterangan;
      $.ajax({
        url: "<?php echo site_url('kasusbencana/simpantempkorban')?>",
        data: datanya,
        type: "POST",
        cache:false,
        success:function(msg){
          tampiltemp_korban();
        }
      })
    });



});
$(document).ready(function(e){
    $('#tambahrusak').click(function(e){
      var idtempkerusakan=$('#idtempkerusakan').val();
      var jeniskerusakan=$('#jeniskerusakan').val();
      var jumlah=$('#jumlah').val();
      var keteranganrusak=$('#keteranganrusak').val();
      datanya="&idtempkerusakan="+idtempkerusakan+"&jeniskerusakan="+jeniskerusakan+"&jumlah="+jumlah+"&keteranganrusak="+keteranganrusak;
      $.ajax({
        url: "<?php echo site_url('kasusbencana/simpantempkerusakan')?>",
        data: datanya,
        type: "POST",
        cache:false,
        success:function(msg){
            tampiltemp_kerusakan();
        }
      })
    });
});
</script>
<script>   
 function ambil(kodekorban,namakorban,alamat,jeniskelamin,keterangan)  
 {     
	$('#kodekorban').val(kodekorban);    
	$('#namakorban').val(namakorban);   
    $('#alamat').val(alamat);     
    $('#jeniskelamin').val(jeniskelamin);     
    $('#keterangan').val(keterangan);     
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
	    		<td width="100"><div class="col-sm-114"><input type="date" class="form-control" name="tglkejadian" id="tglkejadian"></td>
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
	    		<td><div class="col-sm-114"><input type="text" class="form-control" name="waktukejadian" id="waktukejadian"></td>
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
            <div class="box-body table-responsive ">     
                           <table class="table table-bordered">       
            <tr>         
            <td>Kode Korban</td>         
            <td width="100"><div class="col-sm-114"><input type="text" class="form-control" readonly name="kodekorban" id="kodekorban">
            </div>
            <?php echo $this->session->flashdata('error');?>
            </td>    
        
            <td><button type="button" title="Cari Korban" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-search'>
            </span>
            </button>        
            </td>   
         
            <td>Nama Korban</td>         
            <td><input type="text" class="form-control" readonly name="namakorban" id="namakorban">
            </td>
           
            <td>Alamat</td>        
            <td width="100">
            <div class="col-sm-12"><input type="text" class="form-control" name="alamat" id="alamat">
            </div>
            </td> 
        
            <td>Jenis Kelamin</td>         
            <td width="70"> 
            <div class="col-sm-14"><input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin">
            </div>
            </td> 

            <td>Keterangan</td>         
            <td width="70"> 
            <div class="col-sm-14"><input type="text" class="form-control" name="keterangan" id="keterangan">
            </div>
            </td>

            <td>
            <button type="button" id="tambah" class="btn btn-primary">
            <span class='glyphicon glyphicon-plus'> </span>
            </button>
            </td>      
            </tr>    
            </table>   
            </div>  
        </div> 
 
        <div class="col-xs-12" id="data_sementara">     
            <div class="box-body table-responsive tampil_korban">       
                      
            </div>     
        </div>    

<div class="col-xs-12">   
            <div class="box-body table-responsive">     
            <table class="table table-bordered">       
            <tr>         
	        <td>Kode Kerusakan</td>         
	        <td width="100"><div class="col-sm-114"><input type="text" class="form-control" name="idtempkerusakan" id="idtempkerusakan">
            </div>
            <?php echo $this->session->flashdata('error');?>
	        </td>  
	     
 	        <td>Jenis Kerusakan</td>         
	        <td><input type="text" class="form-control" name="jeniskerusakan" id="jeniskerusakan">
	        </td>
	       
 	        <td>Jumlah Kerusakan</td>        
 	        <td width="100">
	        <div class="col-sm-12"><input type="text" class="form-control" name="jumlah" id="jumlah">
        	</div>
        	</td> 
        
        	<td>Keterangan</td>         
        	<td width="70"> 
        	<div class="col-sm-14"><input type="text" class="form-control" name="keteranganrusak" id="keteranganrusak">
        	</div>
        	</td> 

	        <td>
        	<button type="button" id="tambahrusak" class="btn btn-primary">
        	<span class='glyphicon glyphicon-plus'>	</span>
            </button>
	        </td>      
            </tr>    
            </table>    
            </div>  
        </div> 
 
        <div class="col-xs-12" id="data_sementara">     
            <div class="box-body table-responsive tampil_kerusakan">       
   
            </div>     
        </div>
    <tr>          
    <td colspan="5">               
	<button type="submit" class="btn btn-primary btn-sm"><span class='glyphicon glyphiconfloppy-save'></span> Simpan Transaksi</button>        
    <a class='btn btn-danger btn-sm' title='Hapus Data' href='<?php echo site_url('kasusbencana/index')?>' onClick="return confirm('Anda Yakin menghapus data ini?')"><span class='fa fa-ban'> Batal Transaksi</span></a>        
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
  <td><button class="btn btn-primary btn-xs" type="button" onClick="return ambil('<?php echo $r['kodekorban']?>','<?php echo $r['namakorban']?>','<?php echo $r['alamat']?>','<?php echo $r['jeniskelamin']?>','<?php echo $r['keterangan']?>')"><span class='glyphicon glyphicon-check'>
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