<script>   
 function ambiljenis(dkodejenisbencana)  
 {  
    $('#dkodejenisbencana').val(dkodejenisbencana);    
	$('#myModal').modal('hide');    
 } 
</script> 

<form method="POST" action="<?php echo site_url('laporan/lap_daerahrawan')?>" target="_blank">
 <table> 
 <div class="form-group">
                    <label class="col-sm-2 control-label"> Kode Jenis Bencana</label>
                    <div class="col-sm-3">
                        <input type="text" name="dkodejenisbencana" class="form-control" id="dkodejenisbencana">
                    </div>
                    <div><td><button type="button" title="Cari Jenis Bencana" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-search'></span></div>
                </div> 
 			<tr>   
 				<td>            
 					<div class="modal-footer">           
 						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphiconprint"></i> Cetak</button>           
 						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fatimes"></i> Tutup</button>         
 					</div>       
 				</td> 
 			</tr>  
 		</table> 
 	</form> 
<!-- Modal -->   
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" arialabelledby="myModalLabel">     
<div class="modal-dialog modal-lg" role="document">  
     <div class="modal-content">     
    <div class="modal-header">        
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span ariahidden="true">&times;	
</span>	
</button>          
 <h4 class="modal-title" id="myModalLabel">Cari Data Jenis Bencana</h4>         
  <div class="box-body table-responsive">         
  <table class="table table-bordered table-striped table-hover" id="datatiket">      
       <thead>
<tr>                
<th width="5">No</th>    
    <th>Kode Jenis Bencana</th>     
    <th>Jenis Bencana</th>                              
</tr>             
</thead>   
                  
 <tbody>            
 <?php $no=1;foreach($datajenis->result_array() as $r){?>             
  <tr>                
  <td><?php echo $no ?></td>
  <td><?php echo $r['dkodejenisbencana'] ?></td>                
  <td><?php echo $r['jenisbencana']?></td>              
  <td><button class="btn btn-primary btn-xs" type="button" onClick="return ambiljenis('<?php echo $r['dkodejenisbencana']?>')"><span class='glyphicon glyphicon-check'>
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