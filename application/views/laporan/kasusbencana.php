<form method="POST" action="<?php echo site_url('laporan/lap_kasusbencana')?>" target="_blank">
 <table> 
 	<td colspan="7" align="right">  Tanggal Awal   </td>             
 		<td colspan="2">               
 			<div class="input-group date col-sm-8">                 
 				<div class="input-group-addon">                   
 					<i class="fa fa-calendar"></i>                
 					 </div>                 
 					 <input type="date" class="form-control pull-right" id="datepicker" name="tglawal" placeholder="mm-dd-yyyy" required>               
 					</div>              
 				</td> 
 			</tr> 
 	<tr>             
 		<td colspan="7" align="right">  Tanggal Akhir   </td>             
 		<td colspan="2">               
 			<div class="input-group date col-sm-8">                 
 				<div class="input-group-addon">                   
 					<i class="fa fa-calendar"></i>                
 					 </div>                 
 					 <input type="date" class="form-control pull-right" id="datepicker" name="tglakhir" placeholder="mm-dd-yyyy" required>               
 					</div>              
 				</td> 
 			</tr> 
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
 
 