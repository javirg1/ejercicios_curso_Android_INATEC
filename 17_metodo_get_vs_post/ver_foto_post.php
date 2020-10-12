<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Metodo GET vs POST</title>
</head>
<body>
<?php
//Creo un par de arrays con los nombres y las fotos:
$estaciones = ["Primavera (La sangre altera)","Verano ...","Otoño","Invierno"];
$imagenes = ["primavera","verano","otonio","invierno"];
//Recojo de la URL (por el método GET) la estación elegida:
//Comprobar que las variables vienen en la URL:
if (isset($_POST["estacion"])) {
	//Aqui me viene el número con el código de la estación (0->Primavera, 1->Verano ...)
	$estacion = $_POST["estacion"];

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
		<p>FOTO DE LA ESTACION: <?php echo $estaciones[$estacion] ?></p>

		<img src="imagenes/<?php echo $imagenes[$estacion]?>.jpg" width="500"/> 
	</center>
</body>
</html>