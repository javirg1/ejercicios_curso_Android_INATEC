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
	$consulta = "delete from anuncios where id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha eliminado:
	//Una forma sería, pedir a la bbdd el número de filas afectadas:
	$filas_afectadas = mysqli_affected_rows($conexion);
	return $filas_afectadas;
}

//La función insertar, recibe los datos de un nuevo anuncio y los inserta en la bbdd:
function insertarAnuncio($titulo,$fecha,$precio,$descripcion, $id_usuario) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$consulta = "INSERT INTO anuncios(titulo, descripcion, precio, fecha, id_usuario) VALUES ('$titulo','$descripcion','$precio', '$fecha', '$id_usuario')";
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
	$consulta = "Select id_anuncio,titulo,fecha,precio,descripcion,nombre,usuarios.id_usuario from anuncios,usuarios where id_anuncio = $id_anuncio and usuarios.id_usuario = anuncios.id_usuario";
	$datos = mysqli_query($conexion, $consulta);
	if ($fila = mysqli_fetch_assoc($datos)) {
		//recorro los datos que me devuelve la bbdd y los meto en un array:
		$datos_anuncio["id_anuncio"] = $id_anuncio;
		$datos_anuncio["titulo"] = $fila["titulo"];
		$datos_anuncio["fecha"] = $fila["fecha"];
		$datos_anuncio["precio"] = $fila["precio"];
		$datos_anuncio["descripcion"] = $fila["descripcion"];
		$datos_anuncio["id_usuario"] = $fila["id_usuario"];
		$datos_anuncio["nombre_usuario"] = $fila["nombre"];
	}
	return $datos_anuncio;
}

//Esta función recibe los datos de un anuncio existente y actualiza la bbdd:
function actualizarAnuncio($id_anuncio, $titulo,$fecha,$precio,$descripcion) {
	//Conectar con la bbdd
	require("conexion.php"); 
	$consulta = "UPDATE anuncios SET titulo='$titulo',descripcion='$descripcion',precio='$precio',fecha='$fecha' WHERE id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha actualizado:
	//Una forma sería, pedir a la bbdd el número de filas afectadas:
	$filas_afectadas = mysqli_affected_rows($conexion);
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
?>