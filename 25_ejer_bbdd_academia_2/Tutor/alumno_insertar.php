<?php

$nombre = $_POST["caja_nombre"];
$sexo = $_POST["caja_sexo"];
$cp = $_POST["caja_cp"];
$pob = $_POST["caja_pob"];
$nac = $_POST["caja_fecha_nac"];
$imp = $_POST["caja_importe"];
$est = $_POST["caja_estudios"];

require("conexion.php");

//2.-Si tengo conexion, ya puedo insertar al nuevo usuario en la bbdd:
//Montar una consulta SQL:
$consulta = "INSERT INTO alumnos(nombre, sexo, cod_postal, poblacion, fecha_nac,importe_matricula, estudios) VALUES ('$nombre','$sexo','$cp','$pob','$nac','$imp','$est')";
//echo $consulta; exit;

//3.-Lanzar la consulta a la bbdd mediante la conexion abierta:
mysqli_query($conexion, $consulta);

//4.-Necesito comprobar de alguna forma si el dato se ha insertado:
//Una forma sería, pedir a la bbdd el nuevo id:
$id = mysqli_insert_id($conexion);

if ($id > 0) {
	$pagina = "listado.php";
} else {
	$pagina="nuevo_alumno.php?error=No he podido insertar el alumno";
}
header("Location:$pagina");
?>