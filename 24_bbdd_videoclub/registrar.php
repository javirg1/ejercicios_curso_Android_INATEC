<?php

$titulo = $_POST["titulo"];
$codigo_you = $_POST["codigo_you"];

// Conexion con la bbdd

$conexion = mysqli_connect("localhost", "root", "", "bd_videoclub");

// Consulta SQL de insercción

$sql = "INSERT INTO peliculas(titulo,cod_youtube) VALUES ('$titulo','$codigo_you')";

// Lanzar la consulta

mysqli_query($conexion, $sql);

// Verificar registro OK y redirigir al listado de películas o quedarse en el formulario de registro

$id_pelicula = mysqli_insert_id($conexion);
if ($id_pelicula > 0) {
    $pagina = "peliculas.php";
} else {
    $pagina = "formulario_registro.php?error=No se ha registrado la película";
}
header("location:$pagina");

?>