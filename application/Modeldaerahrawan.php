<style type="text/css">
 .editor
{  
 display:none;   
} 
</style> 

<body>   
<div class="box-body">
<?php echo $this->session->flashdata('pesan');?>
<form method="post" action="<?php echo site_url('penjualan/simpantransaksi')?>" id="tmb" onSubmit="return cetak();">   
<div class="col-xs-12">   
<div class="box-body table-responsive">     
<table class="table table-bordered">       
<tr>         
	<td>Kode</td>         
	<td width="100"><div class="col-sm-114"><input type="text" class="form-control" readonly name="kodebarang" id="kodebarang">
</div>
<?php echo $this->session->flashdata('error');?>
	</td>    
	    
 	<td><button type="button" title="Cari Barang" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-search'>
</span>
</button>        
 	</td>   
	     
 	<td>Nama</td>         
	<td><input type="text" class="form-control" readonly name="namabarang" id="namabarang">
	</td>
	         
	<td>Harga Jual</td>        
	<td><input type="text" class="form-control" name="hargajual" id="hargajual">
	</td> 
	       
 	<td>Jumlah</td>        
 	<td width="100">
	<div class="col-sm-12"><input type="text" class="form-control" name="jumlah" id="jumlah">
	</div>
	</td> 
        
	<td>Diskon</td>         
	<td width="70">
	<div class="col-sm-14"><input type="text" class="form-control" name="diskon" id="diskon">
	</div>
	</td> 
	        
	<td>
	<button type="button" id="tambah" class="btn btn-primary">
	<span class='glyphicon glyphicon-plus'>
	</span>
</button>
	</td>      
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
 	<th>Kode</th>             
	<th>Nama Barang</th> 
	<th>Harga Jual</th>  
	<th>Harga Beli</th>                         
 	<th width="50">Jumlah</th>            
 	<th>Diskon %</th>            
 	<th width="200">Sub Total</th>         
    <th>Aksi</th>          
</tr>       
</thead>         
<tbody>        
 <?php $nomor=1; $total=0; foreach($datatemp->result_array() as $d){ 
 
$subtotal = ($d['hargajual'] *$d['qty'])-(($d['hargajual']*$d['qty'])*$d['diskon']/100);            
$total = $total + $subtotal;?>          
 <tr>            
 <td align="center">
<?php echo $nomor?>
<input id="dataid" type="text" class="form-control editor" value="<?php echo $d['kodebarang']?>"/>
	</td>             
	<td><?php echo $d['kodebarang']; ?>
	</td>             
	<td><?php echo $d['namabarang'] ?>
	</td>  
	         
 	 <td style="cursor:pointer;">             
  	<span class="caption"><?php echo "Rp ".number_format($d['hargajual']);?></span>           
    <input type="text" onKeyDown="update_hargajual(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" value="<?php echo $d['hargajual']?>"/>     
    </td> 
	           
 	<td style="cursor:pointer;">             
 	<span class="caption"><?php echo "Rp ".number_format($d['hargabeli'])?></span>         
   	<input type="text" onKeyDown="update_hargabeli(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" value="<?php echo $d['hargabeli']?>"/>
    </td>
	           
  	<td style="cursor:pointer;">              
 	<span class="caption"><?php echo $d['qty']?></span>             
  	<input type="text" onKeyDown="update_stock(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" value="<?php echo $d['qty']?>"/>      
    </td> 
	
    <td style="cursor:pointer;">         
    <span class="caption"><?php echo $d['diskon']; ?></span>             
 	<input type="text" onKeyDown="update_disc(event,'<?php echo $d['kodebarang']?>')" class="form-control editor" value="<?php echo $d['diskon']?>"/> 
 	</td>     
	         
	<td><?php echo "Rp ".number_format($subtotal)?></td>           
  	<td>              
 	<a class='btn btn-danger btn-xs' title='Hapus Item' href="<?php echo site_url('penjualan/hapusitem/'.$d['kodebarang'].'/'.$d['qty'])?>">
	<span class='glyphicon glyphicontrash'></span></a>            
	 </td>          
</tr> 

        
  <?php $nomor++; } ?>       
  </tbody>        
  <tfoot>          
<tr>            
 	<th colspan="7">SUB TOTAL</th>           
  	<th><?php echo "Rp ".number_format($total)?>               
	<input type="hidden" id="totalbayar" name="totalbayar" value="<?php echo $total?>"/>       
    </th>         
</tr>  
        
<tr>           
  	<th colspan="7">DISC %</th>          
   	<th colspan="2">
	<div class="col-xs-4">               
  	<input type="text" name="dis" id="dis" class="form-control"/>         
    </div>           
  	</th>           
</tr> 
          
<tr>             
	<th colspan="7">TOTAL</th>            
 	<th colspan="2">              
 	<div class="col-xs-12">               
 	<span id="tot"></span>               
  	<input type="hidden" name="bersih" id="bersih">          
    </div>           
 	</th>          
</tr>    
       
<tr>            
 	<td colspan="7" align="right">No. Faktur</td>            
 	<td colspan="2">             
 	<div class="input-group col-sm-8">                
	<input type="text" class="form-control" name="nofaktur" id="nofaktur" required>           
    </div>           
  	</td>         
</tr>        

<tr>         
    <td colspan="7" align="right">Tanggal Jual</td>             
	<td colspan="2">             
  	<div class="input-group date col-sm-8">                
 	<div class="input-group-addon"> 
    <i class="fa fa-calendar"></i>                
	</div>              
   	<input type="date" class="form-control pull-right" id="tglpenjualan" name="tglpenjualan" placeholder="mm-dd-yyyy" required>             
  	</div>             
	</td>          
</tr>       

<tr>          
   <td colspan="5">               
	<button type="submit" class="btn btn-primary btn-sm"/><span class='glyphicon glyphiconfloppy-save'></span> Simpan Transaksi</button>        
       <a class='btn btn-danger btn-sm' title='Hapus Data' href='<?php echo site_url('penjualan/data')?>' onClick="return confirm('Anda Yakin menghapus data ini?')"><span class='fa fa-ban'> Batal Transaksi</span></a>        
	<button type="submit" onClick="location.href=('<?php echo site_url('penjualan/data')?>')" class="btn btn-success btn-sm"><span class='fa  fa-mail-reply-all'></span> Kembali</button>       
    </td> 
	            
	<td colspan="2" align="right">konsumen</td>        
    <td colspan="2">           
  	<div class="input-group col-sm-8">              
 	<select class="form-control select2" style="width: 100%;" name="konsumen" id="konsumen" required>            
    <option selected>-Pilih-</option>                 
    <?php foreach($datakonsumen->result_array() as $k){?>             
	<option value="<?php echo $k['kodekonsumen']?>"><?php echo $k['namakonsumen']?></option>             
    <?php }?>             
  </select>           
  </div>           
  </td>          
 </tr>      
   </tfoot>      
 </table>      
 </div>     
</div>    
 </form> 
  </div> 
</body> 