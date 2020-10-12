<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Encuentra premio</title>
</head>
<body>
	<center>
		<h3>ENCUENTRA PREMIO</h3>

		<?php
		for ($pos=0;$pos<3;$pos++) { ?>
			<a href="jugada.php?pos=<?php echo $pos ?>"><img src="imagenes/interrogacion.png" width="120"/></a>
		<?php } ?>
	</center>
	
</body>
</html>