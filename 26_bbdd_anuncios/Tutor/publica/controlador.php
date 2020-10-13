<?php
//Vamos a guardar en variable de sesión el id de usuario que se loguee o registre de forma correcta:
session_start();
//Incluyo el archivo con las funciones:
require("../includes/funciones.php");

//Este archivo controlador, se encarga de centralizar las comprobaciones:
//Comprobar si viene un campo por POST con la variable op que indica la operación a realizar:
if (isset($_POST["op"])) {
	$op = $_POST["op"];
} else {
	$op=0;
	$pagina = "index.php";
}

//Va a gestionar distintas operaciones:
if ($op == 1) {
	//Login:
	//Recoger datos del formulario de login y validar si el usuario es correcto:
	$email = $_POST["caja_email"];
	$password = $_POST["caja_password"];

	//Llamar a la función validar:
	$id_usuario = validar($email,$password);

	//Comprobar el resultado:
	if ($id_usuario > 0) {
		//Guardo los datos del usuario en la sesión:
		$datos_usuario = cargarDatosUsuario($id_usuario);
		$_SESSION["id_usuario"] = $datos_usuario["id"];
		$_SESSION["nombre_usuario"] = $datos_usuario["nombre"];
		$pagina = "../privada/index.php";
	} else {
		//El login ha fallado:
		$pagina = "login.php?error=Login incorrecto";
	}
}

if ($op == 2) {
	//Registro nuevo usuario:
	$nombre = $_POST["caja_nombre"];
	$email = $_POST["caja_email"];
	$password = $_POST["caja_password"];

	//Llamar a la función registrar:
	$id_usuario = registrar($nombre, $email, $password);

	//Compruebo si el registro ha ido bien:
	if ($id_usuario > 0) {
		//El proceso de registro es correcto: Guardo el id en la variable de sesión:
		$_SESSION["id_usuario"] = $id_usuario;
		$_SESSION["nombre_usuario"] = $nombre;
		//redirijo a la zona privada:
		$pagina = "../privada/index.php";
	} else {
		//El registro ha fallado:
		$pagina = "registro.php?error=Registro incorrecto";
	}
}
//En función del resultado, redirijo a una página u otra:
header("Location:$pagina");

?>