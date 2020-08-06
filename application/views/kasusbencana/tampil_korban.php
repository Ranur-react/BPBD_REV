<table class="table table-bordered">         
                    <thead>           
                    <tr>             
                    <th width="50" align="center">No</th>            
                    <th>Kode</th>             
                    <th>Nama Korban</th> 
                    <th>Alamat</th>                         
                    <th>Jenis Kelamin</th>            
                    <th>Keterangan</th>         
                    <th>Aksi</th>          
                    </tr>       
                    </thead>         
                    <tbody>        
                    <?php $nomor=1; $total=0; foreach($datatempkorban->result_array() as $d){?>          
                    <tr>            
                    <td align="center">
                    <?php echo $nomor?>
                    <input id="dataid" type="text" class="form-control editor" value="<?php echo $d['kodekorban']?>"/>
                    </td>             
                    <td><?php echo $d['kodekorban']; ?>
                    </td>             
                    <td><?php echo $d['namakorban']?>
                    </td>    
                    <td><?php echo $d['alamat']?>     
                    </td>
                    <td><?php echo $d['jeniskelamin']?>   
                    </td>
                    <td><?php echo $d['keterangan']?>    
                    </td>
                    <td>                
                    <a class='btn btn-danger btn-xs' title='Hapus Item' onclick="hapustempkorban('<?= $d['kodekorban']  ?>')">
                    <span class='glyphicon glyphicontrash'></span></a>            
                     </td>          
                    </tr> 
                    <?php $nomor++; } ?>       
                    </tbody>        
                </table>