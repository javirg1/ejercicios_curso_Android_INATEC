<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - Ficha alumno</title>
</head>
<?php
//Compruebo si en la url (GET) viene alguna variable con error:
if (isset($_GET["id"])) {
    $id = $_GET["id"]; 
}else{
    echo "No se ha seleccionado ningún alumno";
}
// Tomamos los datos que vienen por url desde el formulario listado.php


require ("conexion.php");
//$conexion = mysqli_connect("localhost", "root", "", "bd_academia");

$sql = "SELECT * FROM alumnos WHERE id=$id";

$datos = mysqli_query($conexion, $sql);

while ($registro = mysqli_fetch_assoc($datos)) {
    $nombre = $registro["nombre"];
    $sexo = $registro["sexo"];
    $cp = $registro["cod_postal"];
    $poblacion = $registro["poblacion"];
    $fecha_nac = $registro["fecha_nac"];
    $importe_matricula = $registro["importe_matricula"];
    $estudios = $registro["estudios"];
}

?>

<body>
    <center>
        <h1>Academia</h1>
        <br>
        <h2>Ficha del alumno</h2>
        <br>
        <form action="" method="">
            <!-- En los inputs, en el atributo value, dejamos los valores tomados en las variables de las líneas 15÷17-->
            <label for="">Id:</label>
            <input type="text" name="id" value="<?php echo $id ?>">
            <br><br>
            <label for="">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>">
            <br><br>
            <label for="">Sexo:</label>
            <input type="text" name="sexo" value="<?php echo $sexo ?>">
            <br><br>
            <label for="">CP:</label>
            <input type="text" name="cp" value="<?php echo $cp ?>">
            <br><br>
            <label for="">Población:</label>
            <input type="text" name="poblacion" value="<?php echo $poblacion ?>">
            <br><br>
            <label for="">Fecha nacimiento:</label>
            <input type="text" name="fecha_nac" value="<?php echo $fecha_nac ?>">
            <br><br>
            <label for="">Importe matrícula:</label>
            <input type="text" name="importe_matricula" value="<?php echo $importe_matricula ?>">
            <br><br>
            <p>Estudios:</p>
            <textarea name="estudios" id="" cols="30" rows="10" ><?php echo $estudios ?></textarea>
        </form>
        <br>
        <a href="listado.php">Lista Alumnos</a>
    </center>
</body>

</html>