<?php

if(isset($_GET["id_peli"])){
    $del_peli=$_GET["id_peli"];
}

// Conexion con la bbdd

$conexion = mysqli_connect("localhost", "root", "", "bd_videoclub");

// Consulta SQL de insercción

$sql = "DELETE FROM peliculas WHERE id_pelicula=$del_peli";

// Lanzar la consulta, comprobar que se ha eliminado y mostrar de nuevo el listado

mysqli_query($conexion, $sql);

$filas_afectadas=mysqli_affected_rows($conexion);

if($filas_afectadas>0){
    header("location:peliculas.php");
}else{
    echo "<p>No se ha podido eliminar la película";
}