<?php
// ************************************************************************************
// MODELO
// FUNCIONES DE USO EN LA BASE DE DATOS
// ************************************************************************************

// ************************************************************************************
// Validar entrada a zona privada
// Recibe email y password y devuelve el id_usuario si el login es correcto, o un 0 si no
// ************************************************************************************

function validar($email, $password)
{
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

// ************************************************************************************
// Registra un nuevo usuario
// Recibe los datos necesarios para dar de alta un nuevo usuario, y devuel el id que le toca
// Si hay algún problema pues devuelve un 0
// ************************************************************************************

function registrar($nombre, $email, $password)
{
	//Conectar con la bbdd
	require("conexion.php");
	$consulta = "INSERT INTO usuarios(nombre, email, password) VALUES ('$nombre','$email','$password')";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Una forma sería, pedir a la bbdd el nuevo id de usuario:
	return mysqli_insert_id($conexion);
}

// ************************************************************************************
// Devuelve los datos de un usuario nuevo usuario
// Devuelve un array con el id_usuario, el nombre y el email
// ************************************************************************************

function cargarDatosUsuario($id_usuario)
{
	//Creo el array vacio:
	$datos_usuario = array();
	require("conexion.php");
	$consulta = "Select * from usuarios where id_usuario = $id_usuario";
	$datos = mysqli_query($conexion, $consulta);
	//Devolver true o false si ha ido bien o mal la validación:
	if ($fila = mysqli_fetch_assoc($datos)) {
		$datos_usuario["id"] = $id_usuario;
		$datos_usuario["nombre"] = $fila["nombre"];
		$datos_usuario["email"] = $fila["email"];
	}
	return $datos_usuario;
}

// ************************************************************************************
// Crea un nuevo anuncio
// ************************************************************************************

function nuevo_anuncio($id_usuario, $titulo, $descripcion, $precio, $fecha)
{
	//Conectar con la bbdd
	require("conexion.php");
	$consulta = "INSERT INTO anuncios(id_usuario, titulo, descripcion,precio,fecha) VALUES ('$id_usuario','$titulo','$descripcion','$precio','$fecha')";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Una forma sería, pedir a la bbdd el nuevo id de anuncio:
	return mysqli_insert_id($conexion);
}

/* // ************************************************************************************
// Devuelve los datos de un anuncio
// Devuelve un array con los datos que se mostrarán en el formulario EDITAR
// ************************************************************************************ */

/* function cargar_anuncio($id_anuncio)
{
	//Creo el array vacio:
	$datos_anuncio = array();
	require("conexion.php");
	$consulta = "Select * from anuncios where id_anuncio = $id_anuncio";
	$datos = mysqli_query($conexion, $consulta);
	//Devolver true o false si ha ido bien o mal la validación:
	if ($fila = mysqli_fetch_assoc($datos)) {
		$datos_anuncio["id_anuncio"] = $fila["id_anuncio"];
		$datos_anuncio["titulo"] = $fila["titulo"];
		$datos_anuncio["descripcion"] = $fila["descripcion"];
		$datos_anuncio["precio"] = $fila["precio"];
		$datos_anuncio["fecha"] = $fila["fecha"];
	}
	return $datos_anuncio;
} */

// ************************************************************************************
// Edita los datos de un anuncio
// ************************************************************************************

function editar($id_anuncio, $titulo, $descripcion, $precio, $fecha)
{
	//Conectar con la bbdd
	require("conexion.php");
	$consulta = "UPDATE anuncios SET titulo='$titulo', descripcion='$descripcion', precio='$precio', fecha='$fecha' WHERE id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta:
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Compruebo si ha habido filas (registros) afectados
	return mysqli_affected_rows($conexion);
}

// ************************************************************************************
// Elimina los datos de un anuncio
// ************************************************************************************

function eliminar($id_anuncio)
{
	//Conectar con la bbdd
	require("conexion.php");
	$consulta = "DELETE FROM  anuncios WHERE id_anuncio=$id_anuncio";
	//Lanzar la consulta a la bbdd mediante la conexion abierta
	mysqli_query($conexion, $consulta);
	//Necesito comprobar de alguna forma si el dato se ha insertado:
	//Compruebo si ha habido filas (registros) afectados
	return mysqli_affected_rows($conexion);
}

// ************************************************************************************
// Devuelve los datos de un anuncio
// Devuelve un array con los datos que se mostrarán en los formularios EDITAR y DETALLES_ANUNCIO
// ************************************************************************************

//Esta función carga los datos de un anuncio, partiendo de su id:
function cargarDatosAnuncio($id_anuncio) {
	//Creamos el array vacio
	$datos_anuncio = array();
	require("conexion.php");
	// SQL que combina datos de las dos tabas para mostrar el nombre del usuario que ha publicado el anuncio 
	$consulta = "Select id_anuncio,titulo,fecha,precio,descripcion,nombre,usuarios.id_usuario from anuncios,usuarios where id_anuncio = $id_anuncio and usuarios.id_usuario = anuncios.id_usuario";
	//Lanzamos la consulta a la bbdd mediante la conexion abierta
	$datos = mysqli_query($conexion, $consulta);
	//recorro los datos que me devuelve la bbdd y los meto en un array
	if ($fila = mysqli_fetch_assoc($datos)) {
		$datos_anuncio["id_anuncio"] = $id_anuncio;
		$datos_anuncio["titulo"] = $fila["titulo"];
		$datos_anuncio["fecha"] = $fila["fecha"];
		$datos_anuncio["precio"] = $fila["precio"];
		$datos_anuncio["descripcion"] = $fila["descripcion"];
		$datos_anuncio["id_usuario"] = $fila["id_usuario"];
		$datos_anuncio["nombre"] = $fila["nombre"];
	}
	return $datos_anuncio;
}

// ************************************************************************************
// Devuelve los datos de los anuncios de un usuario o de todos los usuarios
// Devuelve un array con los datos que se mostrarán en el el -index.php- de la zona pública y privada
// ************************************************************************************

//Ponemos un parametro opcional (al igualarlo a cero, pasa a ser un parametro opcional)
function cargarAnuncios($id_usuario=0) {
	// Creamos el array vacio
	$datos_anuncios = array();
	require("conexion.php");
	if ($id_usuario>0) {
		$consulta = "SELECT * FROM anuncios WHERE id_usuario = $id_usuario";
	} else {
		$consulta = "SELECT * FROM anuncios";
	}
	$datos = mysqli_query($conexion, $consulta);
	while ($fila = mysqli_fetch_assoc($datos)) {
		// Dejamos en el array cada una de las filas
		$datos_anuncios[] = $fila;
	}
	return $datos_anuncios;
}