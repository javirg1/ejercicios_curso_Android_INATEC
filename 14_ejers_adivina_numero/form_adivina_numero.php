<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina un número</title>
</head>

<body>
    <center>
        <h3>Adivina un número</h3>
        <form action="adivina.php" method="post">
            <p>
                Introduce un número entre 1 y 3
            </p>
            <p>
                <input type="number" min="1" max="3" name="numero">
            </p>
            <p>
                <input type="submit" value="Validar">
            </p>
        </form>
    </center>
</body>

</html>