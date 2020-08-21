                    <select class="form-control select2" style="width: 100%;" name="kkodekorong" id="kkodenagari" required>            
                    <option selected>-Pilih-</option>                 
                    <?php foreach($datakorong->result_array() as $k){?>             
                    <option value="<?php echo $k['kodekorong']?>"><?php echo $k['namakorong']?></option>             
                    <?php }?>             
                    </select>