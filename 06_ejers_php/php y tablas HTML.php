<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Ejercicios con PHP y Tablas HTML</title>
</head>

<body>
    <h3 style='color:blue'>1.- Mediante HTML y PHP crea un código que obtenga un número aleatorio entre 1 y 10 y nos
        muestre una tabla con una fila cabecera que indique “LISTA ALUMNOS” y debajo tantas filas como el número
        aleatorio obtenido. En una segunda columna, como cabecera que indique “NOTA”, y por cada alumno obtén una nota
        de forma aleatoria entre 0 y 10, con una posición decimal.
        Una vez terminada la tabla, muestra un breve párrafo que indique la nota media.</h3>
    <table>
        <tr>
            <td class="tabla1 cabecera">LISTA ALUMNOS</td>
            <td class="tabla1 cabecera">NOTA</td>
        </tr>
        <?php
        $alum = rand(1, 10);
        $suma = 0;
        $media = 0;
        for ($a = 1; $a <= $alum; $a++) {
            $nota = rand(10, 100) / 10;
            $suma = $suma + $nota;
            $media = $suma / $alum;
        ?>
            <tr>
                <td>
                    Alumno <?php echo "$a" ?>
                </td>
                <td>
                    <?php echo "$nota" ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
    echo "<p>La nota media es: " . round($media, 1) . "</p>"
    ?>
    <hr>
    <hr>
    <h3 style='color:blue'>2.-Mediante HTML y PHP crea una tabla de 1 sola fila con 10 columnas (también llamadas
        celdas). En las primeras 9 celdas, muestra un número aleatorio entre 1 y 10. En la última celda, la décima,
        muestran en negrita (etiqueta <strong>) la suma total de todos los números aleatorios obtenidos. El
            resultado será algo similar a esto (en formato tabla HTML):</h3>
    <?php
    $suma = 0;
    echo "<table border=1>";
    echo "<tr>";
    for ($c = 1; $c <= 10; $c++) {
        $num = rand(1, 10);
        $suma = $suma + $num;
        echo "<td>$num</td>";
    }
    echo "<td><strong>Suma: $suma</strong></td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <hr>
    <hr>
    <h3 style='color:blue'>3.-Mediante HTML y PHP, crea una tabla de 1 columna y tantas filas como números
        aleatorios
        entre 1 y 10 vayas obteniendo, hasta que salga el número 7. Por último añade una última fila con el total de
        números obtenidos.</h3>
    <?php
    $num = 0;
    $suma = 0;
    echo "<table border=1>";
    while ($num != 7) {
        $num = rand(1, 10);
        $suma = $suma + $num;
        echo "<tr>";
        echo "<td>$num</td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td>Suma: $suma</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <hr>
    <hr>
    <h3 style='color:blue'>4.-Obtén un número aleatorio entre 2 y 10, y crea una tabla HTML cuadrada, de X filas y X
        columnas (Por ejemplo, si obtenemos el número 3, debemos crear una tabla de 3 filas y 3 columnas. El
        contenido
        de cada celda, será un número consecutivo (contar las celdas).</h3>
    <?php
    $num = rand(2, 10);
    $n = 0;
    echo "<p>Tabla de $num filas x $num columnas</p>";
    echo "<table border=1>";
    for ($f = 1; $f <= $num; $f++) {
        echo "<tr>";
        for ($c = 1; $c <= $num; $c++) {
            $n++;
            echo "<td>$n</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <hr>
    <h3 style='color:blue'>5.-Mediante HTML y PHP que cree una tabla de 5 filas y 5 columnas (en total 25 casillas).
        En cada casilla, debe obtenerse un código RGB de forma aleatoria entre 100000 y 999999. En el contenido de
        la casilla se mostrará el código del color (Por ejemplo #112233) y debe mostrarse como color de fondo de la
        casilla dicho color.</h3>
    <?php
    echo "<table border=1>";
    for ($f = 1; $f <= 5; $f++) {
        echo "<tr>";
        for ($c = 1; $c <= 5; $c++) {
            $color = "#" . rand(100000, 999999);
            echo "<td style='background-color:$color; color:white;'>$color</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>








</body>

</html>