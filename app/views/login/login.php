<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3><?php echo $titulo; ?></h3>
	<ul>
		<?php foreach($contactos as $con) { ?>
			<li><a><?php echo $con->nombre." ".$con->apellido; ?></a></li>
		<?php } ?>
	</ul>
</body>
</html>