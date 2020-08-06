                <table class="table table-bordered">         
                    <thead>           
                    <tr>             
	                <th width="50" align="center">No</th>            
 	                <th>Kode Kerusakan</th>             
	                <th>Jenis Kerusakan</th> 
	                <th>Jumlah Kerusakan</th>                         
 	                <th>Keterangan</th>         
                    <th>Aksi</th>          
                    </tr>       
                    </thead>         
                    <tbody>        
                    <?php $nomor=1; $total=0; foreach($datatempkerusakan->result_array() as $d){?>          
                    <tr>            
                    <td align="center">
                    <?php echo $nomor?>
                    <input id="dataid" type="text" class="form-control editor" value="<?php echo $d['idtempkerusakan']?>"/>
	                </td> 
                    <td><?php echo $d['idtempkerusakan']; ?>
	                </td>             
	                <td><?php echo $d['jeniskerusakan']; ?>
	                </td>             
	                <td><?php echo $d['jumlah']?>
	                </td>    
                    <td><?php echo $d['keteranganrusak']?>     
                    </td>
                  	<td>                
                 	<a class='btn btn-danger btn-xs' title='Hapus Item' onclick="hapustemp_kerusakan('<?= $d['idtempkerusakan'] ?>')" >
                	<span class='glyphicon glyphicontrash'></span></a>            
                	 </td>          
                    </tr> 
                    <?php $nomor++; } ?>       
                    </tbody>
                    <tfoot>          
                    <tr>         
                    <td>Taksiran Kerugian</td>         
                    <td><div class="col-sm-114"><input type="text" class="form-control" name="taksirankerugian" id="taksirankerugian"></td>
                    </tr>
                    <tr>
                    <td>Keterangan</td>         
                    <td><div class="col-sm-114"><input type="text" class="form-control" name="keterangan" id="keterangan"></td>
                    </tr>
                    </tfoot>       
                </table>   