<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP. Grupo 5</title>
</head>

<body>
    <center>
        <h3 style='color:blue'>1.- Crea un código php que muestre los números del 1 al 10, pero en orden descendente.</h3>
        <?php
        for ($n = 10; $n >= 1; $n--) {
            echo "$n ";
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>2.- Crea un código php que muestre números aleatorios entre 1 y 7 hasta que salga dos veces consecutivas el mismo número.</h3>
        <?php
        $parar = false;
        $n1 = 0;
        do {
            $n = rand(1, 7);
            echo "$n ";
            if ($n == $n1) {
                $parar = true;
            } else {
                $n1 = $n;
            }
        } while ($parar == false);
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>3.- Crea un código php que muestre los números entre 1 y 100 que son múltiplos de 4 y 6 a la vez.</h3>
        <?php
        for ($n = 1; $n <= 100; $n++) {
            if ($n % 4 == 0 && $n % 6 == 0) {
                echo "$n ";
            }
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>4.- Crea una código php que muestre una imagen con un “chiste gráfico”. Las imágenes están publicadas en Internet y siguen el patrón del siguiente link:</h3>
        <h3 style='color:blue'>https://www.creativosonline.org/blog/wp-content/uploads/2015/05/humor-informatico-1.jpg</h3>
        <h3 style='color:blue'>https://www.creativosonline.org/blog/wp-content/uploads/2015/05/humor-informatico-2.jpg</h3>
        <h3 style='color:blue'>….</h3>
        <h3 style='color:blue'>https://www.creativosonline.org/blog/wp-content/uploads/2015/05/humor-informatico-19.jpg</h3>
        <h3 style='color:blue'>NO DESCARGUES LAS IMAGENES, simplemente crea una página que muestre un chiste de forma aleatoria, teniendo en cuenta que los siguientes números no son válidos (no existe la url asociada al número): 4 7 14</h3>
        <?php
        $n = rand(1, 19);
        if ($n != 4 && $n != 7 && $n != 14) {
            $image = "https://www.creativosonline.org/blog/wp-content/uploads/2015/05/humor-informatico-" . $n . ".jpg";
            echo "<img src=$image>";
            echo "<p><b>humor-informatico-" . $n . ".jpg</b></p>";
        } else {
            echo "La imagen <b>humor-informatico-" . $n . ".jpg</b> no existe en el servidor";
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>5.- Practica una instrucción que no hemos visto ahora que es: switch () … case: … Busca algún ejemplo del uso en PHP de esta instrucción en Internet y aplícalo al siguiente supuesto: Obten un número aleatorio entre 1 y 7, y muestra en pantalla el día de la semana correspondiente, siendo 1 el Lunes y 7 el Domingo. Debes usar la instrucción switch () case mencionada.</h3>
        <?php
        $diaSemana = rand(1, 7);
        switch ($diaSemana) {
            case 1:
                echo "<h4>$diaSemana - Lunes</h4>";
                break;
            case 2:
                echo "<h4>$diaSemana - Martes</h4>";
                break;
            case 3:
                echo "<h4>$diaSemana - Miércoles</h4>";
                break;
            case 4:
                echo "<h4>$diaSemana - Jueves</h4>";
                break;
            case 5:
                echo "<h4>$diaSemana - Viernes</h4>";
                break;
            case 6:
                echo "<h4>$diaSemana - Sábado</h4>";
                break;
            case 7:
                echo "<h4>$diaSemana - Domingo</h4>";
                break;
        }
        ?>
    </center>
</body>

</html>