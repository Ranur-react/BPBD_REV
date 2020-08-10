<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
</head>
<body>
	<hr>
		<?php               
	foreach($data->result_array() as $i) 
	{   
		 include('tabel_1.php'); 
	?>  
	<hr>
		<?php } ?>
	 
</body>
</html>