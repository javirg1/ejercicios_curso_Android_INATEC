<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - Total matrículas</title>
    <style>
    * {
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>Academia</h1>
    <h2>Matrículas</h2>
    <?php
    require("conexion.php");
    //$conexion = mysqli_connect("localhost", "root", "", "bd_academia");
    $sql = "SELECT sum(importe_matricula) as total_matriculas FROM alumnos";
    $datos = mysqli_query($conexion, $sql);
    if ($registro = mysqli_fetch_assoc($datos)) {
        $importe = $registro["total_matriculas"]; ?>
    <h3>Importe total de las matriculas: <?php echo "$importe €" ?></h3>
    <?php } ?>
</body>
<br><br>
<a href="listado.php">Listado de alumnos</a>

</html>