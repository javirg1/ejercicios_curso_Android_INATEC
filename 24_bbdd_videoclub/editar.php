<?php
$id_pelicula=$_POST["id_pelicula"];
$titulo = $_POST["titulo"];
$codigo_you = $_POST["codigo_you"];

// Conexion con la bbdd

$conexion = mysqli_connect("localhost", "root", "", "bd_videoclub");

// Consulta SQL de insercción

$sql = "UPDATE peliculas SET titulo='$titulo', cod_youtube='$codigo_you' WHERE id_pelicula=$id_pelicula";


// Lanzar la consulta

mysqli_query($conexion, $sql);

// Verificar registro OK y redirigir al listado de películas o quedarse en el formulario de registro

$filas_afectadas = mysqli_affected_rows($conexion);

if ($filas_afectadas > 0) {
	$pagina = "peliculas.php";
} else {
	$pagina = "peliculas.php?error=No he podido actualizar la peli";
}
//Redirijo a la página correspondiente:
header("Location:$pagina");