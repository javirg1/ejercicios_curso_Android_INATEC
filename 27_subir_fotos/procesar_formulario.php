<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo Subir Fotos en un Formulario - Recibo los datos</title>
</head>
<body>
	
	<center>
		<p>PAGINA QUE RECIBE LOS DATOS:</p>

<?php
//Recoger el nombre del usuario:
$usuario = $_POST["inp_nombre_usuario"];


//Recoger el archivo (si es q envía)
if(!file_exists($_FILES['inp_imagen']['tmp_name']) || !is_uploaded_file($_FILES['inp_imagen']['tmp_name'])) {
    $ha_subido_archivo = false;
    echo "NO ha elegido un archivo";
} else {
	$ha_subido_archivo = true;
	echo "ha elegido un archivo";
}
//Compruebo si ha subido archivo o no:
if ($ha_subido_archivo == true) {
	//Proceso los datos del archivo:
	//Ya estoy seguro de que ha enviado un archivo en el formulario y el servidor lo ha recibido
	//Recoger el nombre original del archivo
	$nombre_archivo_original = $_FILES["inp_imagen"]["name"];
	echo "<p>El archivo con la foto tiene este nombre: ".$nombre_archivo_original."</p>";

	//Obtenemos el peso del archivo, nos lo da en bytes, lo pasamos a kb
	$peso_archivo = $_FILES["inp_imagen"]["size"]/1024;
	echo "<p>El archivo pesa en kilobytes: ".round($peso_archivo)." kb</p>";

	//El tipo de archivo que es:
	$tipo_archivo = $_FILES["inp_imagen"]["type"];
	echo "<p>El tipo de archivo es: ".$tipo_archivo."</p>";

	//Obtener el archivo que ha venido del formulario y guardarlo en la carpeta imágenes del servidor:
	$archivo = $_FILES["inp_imagen"]["tmp_name"];
	//Especificamos la carpeta de subida (donde lo voy a copiar)
	$ruta_de_subida = __DIR__."/imagenes/";

	//Mi objetivo es guardar la imagen en mi carpeta de imagenes del servidor, pero con un nombre único (no con el nombre original)
	//Hay que añadir la extensión según el archivo original:
	$extension_original = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);
	echo "<p>El archivo tiene concretamente esta extensión: ".$extension_original."</p>";

	//Voy a crear un nombre de archivo único con el que se guardará en el servidor:
	//Cojo el tiempo en milisegundos:
	$nombre_en_el_servidor = round(microtime(true) * 1000);
	//Y por mayor seguridad, le añado un número aleatorio de 5 digitos:
	$nombre_en_el_servidor = $nombre_en_el_servidor . "_" .rand(10000,99999).".".$extension_original;
	echo "<p>El archivo con el nombre aleatorio con el que voy a guardar en el servidor es: ".$nombre_en_el_servidor."</p>";

	//Necesito una función que me guarde el archivo en la carpeta del servidor:
	move_uploaded_file($archivo,$ruta_de_subida.$nombre_en_el_servidor);

}
?>
	</center>
</body>
</html>