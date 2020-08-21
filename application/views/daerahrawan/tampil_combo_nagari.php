                        <select class="form-control kd_nagari " style="width: 100%;" name="kode_nagari" id="kode_nagari" required>        
                            <option selected>-Pilih-</option>                 
                            <?php foreach($datanagari->result_array() as $k){?>             
    	                       <option value="<?php echo $k['kodenagari']?>"><?php echo $k['namanagari']?></option>             
                        <?php }?>             
                        </select>

                        <script>
                        	$(document).ready( function(e) {
                        		                 let kod= "&a=" +$('.kd_nagari').val();
					              $.ajax({
					                    url: '<?= site_url('daerahrawan/combo_tambah_korong')  ?>',
					                    type: "post",
					                    data: kod,
					                    cache: false,
					                    success: function(response) {
					                        // alert("Golongan harus dipilih");
					                        $('.tampil_combo_korong').html('');
					                        $('.tampil_combo_korong').html(response);
					                    } });

                        	$(document).on('change', '.kd_nagari', function(e) {
                        		let kode= "&a=" +$('.kd_nagari').val();
					              $.ajax({
					                    url: '<?= site_url('daerahrawan/combo_tambah_korong')  ?>',
					                    type: "post",
					                    data: kode,
					                    cache: false,
					                    success: function(response) {
					                        // alert("Golongan harus dipilih");
					                        $('.tampil_combo_korong').html('');
					                        $('.tampil_combo_korong').html(response);
					                    } });
								});
                        		});
        //                 	$(document).on('change', '.kd_nagari', function(e) {
        // 
        //         });
                        </script>