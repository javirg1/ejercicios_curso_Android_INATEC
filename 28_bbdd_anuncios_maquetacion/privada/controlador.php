<?php
session_start();
//Estamos en zona privada, vamos a comprobar si existe una variable de sesión que contenga el id de usuario:
if (isset($_SESSION["id_usuario"])) {
	//El usuario está identificado
	//Podría hacer una consulta y obtener todos sus datos
	$id_usuario = $_SESSION["id_usuario"];
} else {
	//El usuario se está intentando colar, no se ha identificado:
	header("Location:../publica/login.php?error=Es necesario identificarse");
	exit;
}
//Incluyo el archivo con las funciones:
require("../includes/funciones.php");
//Este archivo controlador, se encarga de centralizar las operaciones de la zona privada:
//Comprobar si viene un campo por GET con la variable op que indica la operación a realizar:
if (isset($_GET["op"])) {
	$op = $_GET["op"];
} else {
	$op=0;
	$pagina = "index.php";
}

//Va a gestionar distintas operaciones:
if ($op == 1) {	//Eliminar un anuncio
	//Tengo que saber el id del anuncio a eliminar:
	$id_anuncio=$_GET["id_anuncio"];

	//LLlamo a la función eliminar anuncio, pero le tengo que pasar el id del anuncio a eliminar
	$filas_afectadas = eliminarAnuncio($id_anuncio);

	if ($filas_afectadas > 0) {
		$msg = "Anuncio eliminado";
	} else {
		$msg = "No he podido eliminar el anuncio";
	}
}

if ($op == 2) {
	//Insertar nuevo anuncio, recojo los datos del formulario:
	$titulo = $_POST["inp_titulo"];
	$fecha = $_POST["inp_fecha"];
	$precio = $_POST["inp_precio"];
	$descripcion = $_POST["inp_descripcion"];

	//Por defecto el nombre de la imagen cuando el usuario no sube es:
	$nombre_en_el_servidor = "default.png";
	//Comprobamos si se ha adjuntado un archivo (una imagen)
	$ha_subido_archivo = true;
	if(!file_exists($_FILES['inp_imagen']['tmp_name']) || !is_uploaded_file($_FILES['inp_imagen']['tmp_name'])) {
	    $ha_subido_archivo = false;
	}

	if ($ha_subido_archivo == true) {
		//Proceso los datos del archivo:
		//Ya estoy seguro de que ha enviado un archivo en el formulario y el servidor lo ha recibido
		//Recoger el nombre original del archivo
		$nombre_archivo_original = $_FILES["inp_imagen"]["name"];
		//echo "<p>El archivo con la foto tiene este nombre: ".$nombre_archivo_original."</p>";

		//Obtener el archivo que ha venido del formulario y guardarlo en la carpeta imágenes del servidor:
		$archivo = $_FILES["inp_imagen"]["tmp_name"];
		//Especificamos la carpeta de subida (donde lo voy a copiar)
		$ruta_de_subida = __DIR__."/../fotos/";

		//Mi objetivo es guardar la imagen en mi carpeta de imagenes del servidor, pero con un nombre único (no con el nombre original)
		//Hay que añadir la extensión según el archivo original:
		$extension_original = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);
		//echo "<p>El archivo tiene concretamente esta extensión: ".$extension_original."</p>";

		//Voy a crear un nombre de archivo único con el que se guardará en el servidor:
		//Cojo el tiempo en milisegundos:
		$nombre_en_el_servidor = round(microtime(true) * 1000);
		//Y por mayor seguridad, le añado un número aleatorio de 5 digitos:
		$nombre_en_el_servidor = $nombre_en_el_servidor . "_" .rand(10000,99999).".".$extension_original;
		//echo "<p>El archivo con el nombre aleatorio con el que voy a guardar en el servidor es: ".$nombre_en_el_servidor."</p>";

		//Necesito una función que me guarde el archivo en la carpeta del servidor:
		move_uploaded_file($archivo,$ruta_de_subida.$nombre_en_el_servidor);
	}

	//Llamamos a la función que insertar el nuevo anuncio:
	$id_anuncio = insertarAnuncio($titulo,$fecha,$precio,$descripcion,$id_usuario,$nombre_en_el_servidor);
	//Comprobar si se ha insertado o no:
	if ($id_anuncio > 0) {
		$msg = "Anuncio insertado";
	} else {
		$msg = "No he podido insertar el anuncio";
	}

}

if ($op == 3) {
	//Actualizar un anuncio ya existente:
	$id_anuncio = $_POST["inp_id_anuncio"];
	$titulo = $_POST["inp_titulo"];
	$fecha = $_POST["inp_fecha"];
	$precio = $_POST["inp_precio"];
	$descripcion = $_POST["inp_descripcion"];

	//Por defecto el nombre de la imagen cuando el usuario no sube es:
	$nombre_en_el_servidor = "default.png";
	//Comprobamos si se ha adjuntado un archivo (una imagen)
	$ha_subido_archivo = true;
	if(!file_exists($_FILES['inp_imagen']['tmp_name']) || !is_uploaded_file($_FILES['inp_imagen']['tmp_name'])) {
	    $ha_subido_archivo = false;
	}

	if ($ha_subido_archivo == true) {
		//Proceso los datos del archivo:
		//Ya estoy seguro de que ha enviado un archivo en el formulario y el servidor lo ha recibido
		//Recoger el nombre original del archivo
		$nombre_archivo_original = $_FILES["inp_imagen"]["name"];
		//echo "<p>El archivo con la foto tiene este nombre: ".$nombre_archivo_original."</p>";

		//Obtener el archivo que ha venido del formulario y guardarlo en la carpeta imágenes del servidor:
		$archivo = $_FILES["inp_imagen"]["tmp_name"];
		//Especificamos la carpeta de subida (donde lo voy a copiar)
		$ruta_de_subida = __DIR__."/../fotos/";

		//Mi objetivo es guardar la imagen en mi carpeta de imagenes del servidor, pero con un nombre único (no con el nombre original)
		//Hay que añadir la extensión según el archivo original:
		$extension_original = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);
		//echo "<p>El archivo tiene concretamente esta extensión: ".$extension_original."</p>";

		//Voy a crear un nombre de archivo único con el que se guardará en el servidor:
		//Cojo el tiempo en milisegundos:
		$nombre_en_el_servidor = round(microtime(true) * 1000);
		//Y por mayor seguridad, le añado un número aleatorio de 5 digitos:
		$nombre_en_el_servidor = $nombre_en_el_servidor . "_" .rand(10000,99999).".".$extension_original;
		//echo "<p>El archivo con el nombre aleatorio con el que voy a guardar en el servidor es: ".$nombre_en_el_servidor."</p>";

		//Necesito una función que me guarde el archivo en la carpeta del servidor:
		move_uploaded_file($archivo,$ruta_de_subida.$nombre_en_el_servidor);
		//Voy a comprobar si este anuncio ya tenía una foto antes y no era "default.png". En este caso, para no ir dejando fotos que ya no se muestran, la voy a borrar:
		eliminarFoto($id_anuncio);
		//Voy a llamar a la función actualizarAnuncio, pasandole también el nombre de la nueva imagen que he subido:
		//Llamamos a la función que insertar el nuevo anuncio:
		$filas_afectadas = actualizarAnuncio($id_anuncio, $titulo,$fecha,$precio,$descripcion,$nombre_en_el_servidor);
	} else {
		//Llamamos a la función que insertar el nuevo anuncio:
		$filas_afectadas = actualizarAnuncio($id_anuncio, $titulo,$fecha,$precio,$descripcion);
	}

	//Comprobar si se ha actualizado o no:
	if ($filas_afectadas > 0) {
		$msg = "Anuncio actualizado";
	} else {
		$msg = "No he podido actualizar el anuncio";
	}
}

header("Location:index.php?msg=$msg");
?>