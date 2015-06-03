<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<?php foreach ($xmls as $xml): ?>

		<?php echo $xml->id; ?> / <?php echo $xml->xml_name; ?> <br>
		
	<?php endforeach ?>

</body>
</html>