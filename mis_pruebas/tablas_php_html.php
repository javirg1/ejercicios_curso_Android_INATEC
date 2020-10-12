<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Tablas con HTML y PHP</title>
</head>

<body>
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) { ?>
        <tr>
            <td>
                Dato <?php echo"$i" ?>
            </td>
            <td>
                Otro dato <?php echo"$i" ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>



</html>