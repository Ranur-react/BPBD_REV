<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
</head>
<body>
	<hr style="border-top: 2px dashed   grey;">
		<?php               
	foreach($data->result_array() as $i) 
	{   
		 include('tabel_2.php'); 
	?>  
	<hr style="border-top: 2px dashed   grey;">
		<?php } ?>
	 
</body>
</html>