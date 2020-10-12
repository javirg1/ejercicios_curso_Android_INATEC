<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Encuentra premio - Resultado</title>
</head>
<body>
<?php
//Recojo de la URL (por el método GET) la posición elegida:
//Comprobar que la variable viene en la URL:
$resultado = false;
if (isset($_GET["pos"]) == true) {
	$pos_jugador = $_GET["pos"];
	//Voy a echar a suertes si el jugador ha acertado o ha fallado (como son 3 posiciones, un número a boleo entre 0 y 2)
	$num = rand(0,2);
	if ($num == $pos_jugador) {
		//Doy acierto
		$resultado = true;
	} 
} else {
	//Redirigir directamente al index.php
	header("Location:index.php");
	exit;
}
?>
	<center>
		<h3>ENCUENTRA PREMIO- RESULTADO DE LA JUGADA:</h3>

		<?php
		//Mediante un bucle, voy pintando las imágenes y a la vez, comprobando si es la posición elegida por el usuario y si tiene premio o fall:
		for ($pos=0;$pos<3;$pos++) {
			//Estoy pintando una posición:
			$imagen = "interrogacion.png";
			if ($pos_jugador == $pos) {
				//Tengo que ver si le ha salido acierto o fallo:
				if ($resultado == true) {
					$imagen = "premio.png";
				} else {
					$imagen = "fallo.png";
				}
			} 
			?>
			
			<img src="imagenes/<?php echo $imagen ?>" width="120"/></a>
		<?php } ?>
		<p><a href="index.php">Jugar de nuevo</a></p>
	</center>
	
</body>
</html>