<?php
//La validación correcta tiene que ser, email: admin@curso.com y pass: 1234
$email = $_POST["caja_email"];
$password = $_POST["caja_password"];
//Conectar con la bbdd, para ver si tiene algun usuario con el email y el password recibidos:

//1.-Conecto con el servidor de bbdd:
//Creamos una conexión al servidor MySQL y a la bbdd bd_academia
$conexion = mysqli_connect("localhost", "root", "", "bd_academia"); 

//2.-Si tengo conexion, ya le puedo preguntar si en la tabla usuarios tengo un usuario con el email y la clave
//Montar una consulta SQL:
$consulta = "select * from usuarios where email='$email' and clave='$password'";

//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
$datos = mysqli_query($conexion, $consulta);


//4.-Comprobar si me ha devuelto datos:
if ($fila = mysqli_fetch_assoc($datos)) {
	//El proceso de login es correcto:
	$pagina = "intranet.php";
} else {
	//El login ha fallado:
	$pagina = "login.php?error=Login incorrecto";
}
//En función del resultado, redirijo a una página u otra:
header("Location:$pagina");
?>