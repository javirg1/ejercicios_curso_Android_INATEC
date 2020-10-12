<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>
<?php
//Compruebo si en la url (GET) viene alguna variable con error:
if (isset($_GET["error"])) {
    echo "<p style='color:red'>" . $_GET["error"] . "<p>";
}
// Tomamos los datos que vienen por url desde el formulario peliculas.php - link "Editar" del formulario
$id_pelicula = $_GET["id_peli"];
$titulo = $_GET["titulo"];
$cod_youtube = $_GET["cod_youtube"];
?>

<body>
    <center>
        <h1>Videoclub</h1>
        <br>
        <h2>Editar - Películas de youtube</h2>
        <br>
        <form action="editar.php" method="post">
            <!-- En los inputs, en el atributo value, dejamos los valores tomados en las variables de las líneas 15÷17-->
            <input type="hidden" name="id_pelicula" value="<?php echo $id_pelicula ?>"> <!--Pasamos el id_pelicula oculto. Se necesita para la consulta UPDATE del archivo editar.php-->
            <label for="">Título:</label>
            <input type="text" name="titulo" value="<?php echo $titulo ?>" width="120" required>
            <br><br>
            <label for="">Código Youtube:</label>
            <input type="text" name="codigo_you" value="<?php echo $cod_youtube ?>" width="120" required>
            <br><br>
            <input type="submit" value="Actualizar">
        </form>
        <br>
        <a href="peliculas.php">Salir sin actualizar</a>
    </center>
</body>

</html>