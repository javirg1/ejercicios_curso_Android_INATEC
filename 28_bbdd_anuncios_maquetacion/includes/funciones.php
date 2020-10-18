<?php
//Lista de funciones para las operaciones de bbdd

//Recibe email y password y devuelve el id_usuario si el login es correcto, o un 0 si no:
function validar($email, $password) {
	$id_usuario = 0;
	//Conectar con la bbdd
	require("conexion.php"); 
	//Montar la consulta a lanzar
	$consulta = "select * from usuarios where email='$email' and password='$password'";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	$datos = mysqli_query($conexion, $consulta);
	//Devolver true o false si ha ido bien o mal la validación:
	if ($fila = mysqli_fetch_assoc($datos)) {
		$id_usuario = $fila["id_usuario"];
	}
	return $id_usuario;
}

//Recibe los datos necesarios para dar de alta un nuevo usuario, y devuel el id que le toca
//Si hay algún problema pues devuelve un 0:
function registrar($nombre,$email,$password) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$consulta = "INSERT INTO usuarios(nombre, email, password) VALUES ('$nombre','$email','$password')";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Una forma sería, pedir a la bbdd el nuevo id de usuario:
	return mysqli_insert_id($conexion);
}

//Devuelve un array con el id_usuario, el nombre y el email:
function cargarDatosUsuario($id_usuario) {
	//Creo el array vacio:
	$datos_usuario = array();
	require("conexion.php"); 
	$consulta = "Select * from usuarios where id_usuario = $id_usuario";
	$datos = mysqli_query($conexion, $consulta);
	if ($fila = mysqli_fetch_assoc($datos)) {
		$datos_usuario["id"] = $id_usuario;
		$datos_usuario["nombre"] = $fila["nombre"];
		$datos_usuario["email"] = $fila["email"];
	}
	return $datos_usuario;
}

//Esta función elimina un anuncio concreto, devuelve el número de filas afectadas:
//0 -> No ha cambiado nada, con lo cual, no ha eliminado
//1 -> Ha eliminado el anuncio indicado:
function eliminarAnuncio($id_anuncio) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$nombre_foto = null;
	//Primero hago una consulta para obtener el nombre de la foto, si este anuncio tiene asociado foto:
	$consulta = "Select foto from anuncios where id_anuncio = $id_anuncio and foto <> 'default.png'";
	$datos = mysqli_query($conexion, $consulta);
	if ($fila = mysqli_fetch_assoc($datos)) {
		$nombre_foto = $fila["foto"];
	}
	//Elimino de la bbdd este anuncio:
	$consulta = "delete from anuncios where id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha eliminado:
	//Una forma sería, pedir a la bbdd el número de filas afectadas:
	$filas_afectadas = mysqli_affected_rows($conexion);
	if ($filas_afectadas>0) {
		//Elimino la foto asociada si la tiene:
		if ($nombre_foto != null) {
			//Ya tengo el nombre de la foto, la elimino del servidor:
			$ruta = "../fotos/".$nombre_foto;
			unlink($ruta);
		}
	}
	return $filas_afectadas;
}

//La función insertar, recibe los datos de un nuevo anuncio y los inserta en la bbdd:
function insertarAnuncio($titulo,$fecha,$precio,$descripcion, $id_usuario, $nombre_foto) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$consulta = "INSERT INTO anuncios(titulo, descripcion, precio, fecha, id_usuario, foto) VALUES ('$titulo','$descripcion','$precio', '$fecha', '$id_usuario','$nombre_foto')";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Una forma sería, pedir a la bbdd el nuevo id de usuario:
	return mysqli_insert_id($conexion);
}

//Esta función carga los datos de un anuncio, partiendo de su id:
function cargarDatosAnuncio($id_anuncio) {
	//Creo el array vacio:
	$datos_anuncio = array();
	require("conexion.php"); 
	$consulta = "Select id_anuncio,titulo,fecha,precio,descripcion,foto,nombre,usuarios.id_usuario from anuncios,usuarios where id_anuncio = $id_anuncio and usuarios.id_usuario = anuncios.id_usuario";
	$datos = mysqli_query($conexion, $consulta);
	if ($fila = mysqli_fetch_assoc($datos)) {
		//recorro los datos que me devuelve la bbdd y los meto en un array:
		$datos_anuncio["id_anuncio"] = $id_anuncio;
		$datos_anuncio["titulo"] = $fila["titulo"];
		$datos_anuncio["fecha"] = $fila["fecha"];
		$datos_anuncio["precio"] = $fila["precio"];
		$datos_anuncio["descripcion"] = $fila["descripcion"];
		$datos_anuncio["foto"] = $fila["foto"];
		$datos_anuncio["id_usuario"] = $fila["id_usuario"];
		$datos_anuncio["nombre_usuario"] = $fila["nombre"];
	}
	return $datos_anuncio;
}

//Esta función recibe los datos de un anuncio existente y actualiza la bbdd:
function actualizarAnuncio($id_anuncio, $titulo,$fecha,$precio,$descripcion,$foto=null) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$consulta = "UPDATE anuncios SET titulo='$titulo',descripcion='$descripcion',precio='$precio',fecha='$fecha' WHERE id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha actualizado:
	//Una forma sería, pedir a la bbdd el número de filas afectadas:
	$filas_afectadas = mysqli_affected_rows($conexion);
	if ($foto != null) {
		//También viene foto, actualizo el campo en la bbdd:
		$consulta = "UPDATE anuncios SET foto='$foto' WHERE id_anuncio=$id_anuncio";
		$filas_afectadas = mysqli_query($conexion, $consulta);
	}
	return $filas_afectadas;
}

//Esta función carga todos los datos de los anuncios de un usuario:
//Pongo un parametro opcional (al igualarlo a cero, pasa a ser un parametro opcional)
function cargarAnuncios($id_usuario=0) {
	//Creo el array vacio:
	$datos_anuncios = array();
	require("conexion.php"); 
	if ($id_usuario>0) {
		$consulta = "Select * from anuncios where id_usuario = $id_usuario";
	} else {
		$consulta = "Select * from anuncios";
	}
	
	$datos = mysqli_query($conexion, $consulta);
	while ($fila = mysqli_fetch_assoc($datos)) {
		$datos_anuncios[] = $fila;
	}
	return $datos_anuncios;
}

//Esta función recibe el id de un anuncio, comprueba si tiene asociado una foto y en ese caso la elimina del servidor:
function eliminarFoto($id_anuncio) {
	//Cargo el nombre actual de la foto asiciada a este anuncio:
	require("conexion.php"); 
	$consulta = "Select foto from anuncios where id_anuncio = $id_anuncio and foto <> 'default.png'";
	$datos = mysqli_query($conexion, $consulta);
	if ($fila = mysqli_fetch_assoc($datos)) {
		$nombre_foto = $fila["foto"];
		//Ya tengo el nombre de la foto, la elimino del servidor:
		$ruta = "../fotos/".$nombre_foto;
		unlink($ruta);
	}
}
?>