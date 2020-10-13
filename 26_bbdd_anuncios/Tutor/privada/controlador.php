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

	//Llamamos a la función que insertar el nuevo anuncio:
	$id_anuncio = insertarAnuncio($titulo,$fecha,$precio,$descripcion,$id_usuario);
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

	//Llamamos a la función que insertar el nuevo anuncio:
	$filas_afectadas = actualizarAnuncio($id_anuncio, $titulo,$fecha,$precio,$descripcion);
	//Comprobar si se ha actualizado o no:
	if ($id_anuncio > 0) {
		$msg = "Anuncio actualizado";
	} else {
		$msg = "No he podido actualizar el anuncio";
	}
}

header("Location:index.php?msg=$msg");
?>