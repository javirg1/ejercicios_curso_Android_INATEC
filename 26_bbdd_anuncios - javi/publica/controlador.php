<?php

// ************************************************************************************
// CONTROLADOR
// Zona pública
// ************************************************************************************

// ************************************************************************************
// Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
// ************************************************************************************

// Vamos a guardar en variable de sesión el id de usuario que se loguee o registre de forma correcta
session_start();
// Vamos a utilizar las funciones creadas
require("../includes/funciones.php");

// ************************************************************************************
// Comprobamos si viene la variable -op- por el método POST
// Esta variable es la que utilizamos para realizar las distintas operaciones de la zona pública
// ************************************************************************************

if (isset($_POST["op"])) {
	$op = $_POST["op"];
} else {
	$op=0;
	$pagina = "index.php";
}
// Por GET solo vendrán la opción -ver- del formulario -index.php- de la zona pública
if (isset($_GET["op"])) {
    $id_anuncio = $_GET["id_anuncio"];
    $op = $_GET["op"];
}

// ************************************************************************************
// VALIDAR USUARIO - opción 1
// ************************************************************************************

if ($op == 1) {
	// Recogemos datos del formulario de login y validamos si el usuario es correcto
	$email = $_POST["caja_email"];
	$password = $_POST["caja_password"];
	// Llamamos a la función validar que nos devolvera -id_usuario-
	$id_usuario = validar($email,$password);
	// Comprobamos el resultado
	if ($id_usuario > 0) {
		// Llamamos a la función que leerá los datos del usuario, pasándole como argumento el -id_usuario- que hemos obtenido con la función -validar-
		$datos_usuario = cargarDatosUsuario($id_usuario);
		// Guardamos en variables de sesíon los datos obtenidos en el array de la función -cargarDatosUsuario-. Los utilizaremos mientras no salgamos a la zona pública desde el link -sal de tu zona privada- del -index.php- de la zona privada 
		$_SESSION["id_usuario"] = $datos_usuario["id"];
		$_SESSION["nombre_usuario"] = $datos_usuario["nombre"];
		// Redirijimos a -index.php- de la zona privada. Allí mostraremos los anuncios del usuario
		$pagina = "../privada/index.php";
	} else {
		// Redirijimos de nuevo a -login.php- si falla el acceso
		$pagina = "login.php?error=Login incorrecto";
	}
}

// ************************************************************************************
// NUEVO USUARIO - opción 2
// ************************************************************************************

if ($op == 2) {
	// Leemos los datos que vienen del formulario -registro.php- de la zona pública
	$nombre = $_POST["caja_nombre"];
	$email = $_POST["caja_email"];
	$password = $_POST["caja_password"];

	// Llamamos a la función que creará un nuevo usuario en la bbdd. Esta función devuelve el último -id_usuario- que se crea
	$id_usuario = registrar($nombre, $email, $password);

	//Compruebamos si el registro ha ido bien
	if ($id_usuario > 0) {
		//Si se ha guardado el nuevo usuario dejamos datos en variables de sesión
		$_SESSION["id_usuario"] = $id_usuario;
		$_SESSION["nombre_usuario"] = $nombre;
		// Redirijimos a -index.php- de la zona privada con un mensaje de confirmación
		$pagina = "../privada/index.php?aviso=El usuario se ha creado satisfactoriamente";
	} else {
		//Si no se ha guardado el nuevo usuario, redirijimos a -registro.php- de la zona privada con un mensje de error
		$pagina = "registro.php?error=Registro incorrecto";
	}
}

// ************************************************************************************
// DETALLE ANUNCIO (zona pública) - opción 3
// ************************************************************************************

if($op==3){
	// Llamamos a la función que leerá los datos del anuncio, pasándole como argumento el -id_anuncio- que hemos obtenido por el método GET (más arriba en este código)
    $datos_anuncio = cargar_anuncio($id_anuncio);
    // Guardamos en variables de sesíon los datos obtenidos en el array de la función -cargar_anuncio- (excepto -id_anuncio- que ya lo habíamos obtenido por el método GET)
    $_SESSION["id_anuncio"] = $id_anuncio;
    $_SESSION["titulo"] = $datos_anuncio["titulo"];
    $_SESSION["descripcion"] = $datos_anuncio["descripcion"];
    $_SESSION["precio"] = $datos_anuncio["precio"];
    $_SESSION["fecha"] = $datos_anuncio["fecha"];
	// redirijimos a -editar.php- de la zona privada. Allí mostraremos los datos del anuncio utilizando las variables de sesión creadas anteriormente
	$pagina ="detalle_anuncio.php";
}

// ************************************************************************************
//En función del resultado, redirijo a una página u otra pasándole la variable -$pagina-
// ************************************************************************************

header("Location:$pagina");
