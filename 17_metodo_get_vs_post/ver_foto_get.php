<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Metodo GET vs POST</title>
</head>
<body>
<?php
//Recojo de la URL (por el método GET) la estación elegida:
//Comprobar que las variables vienen en la URL:
if (isset($_GET["estacion"]) == true && isset($_GET["foto"]) == true) {
	$estacion = $_GET["estacion"];
	$foto = $_GET["foto"];
} else {
	//Si me faltan datos, muestro un mensaje de error:
	//echo "ME FALTAN LOS DATOS";
	//exit;


	//Otra alternativa sería redirigir directamente al index.php
	header("Location:index.php?error=Tienes que pasar por el index");
	exit;
}
?>
	<center>
		<p>FOTO DE LA ESTACION: <?php echo $estacion ?></p>

		<img src="imagenes/<?php echo $foto?>.jpg" width="500"/> 
	</center>
</body>
</html>