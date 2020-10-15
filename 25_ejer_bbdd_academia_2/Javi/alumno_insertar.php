<?php

$nombre = $_POST["nombre"];
$sexo = $_POST["sexo"];
$cp = $_POST["cod_postal"];
$poblacion = $_POST["poblacion"];
$fecha_nac = $_POST["fecha_nac"];
$importe_matricula = $_POST["importe_matricula"];
$estudios = $_POST["estudios"];

// Conexion con la bbdd
require ("conexion.php");

//$conexion = mysqli_connect("localhost", "root", "", "bd_academia");

// Consulta SQL de insercción

$sql = "INSERT INTO alumnos (nombre,sexo,cod_postal,poblacion,fecha_nac,importe_matricula,estudios) VALUES ('$nombre','$sexo','$cp','$poblacion','$fecha_nac','$importe_matricula','$estudios')";

// Lanzar la consulta

mysqli_query($conexion, $sql);

// Verificar registro OK y redirigir al listado de alumnos o quedarse en el formulario de registro

$id = mysqli_insert_id($conexion);
if ($id > 0) {
    $pagina = "listado.php";
} else {
    $pagina = "formulario_registro.php?error=No se ha podido registrar el alumno";
}
header("location:$pagina");
