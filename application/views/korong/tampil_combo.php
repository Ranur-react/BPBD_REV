                        <select class="form-control " style="width: 100%;" name="kode_nagari" id="kode_nagari" required>        
                            <option selected>-Pilih-</option>                 
                            <?php foreach($datanagari->result_array() as $k){?>             
    	                       <option value="<?php echo $k['kodenagari']?>"><?php echo $k['namanagari']?></option>             
                        <?php }?>             
                        </select>