<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con arrays</title>
</head>

<body>
    <center>
        <h3>1.-Crea un array con 5 números aleatorios entre 1 y 10, y muéstralos en pantalla</h3>
        <?php
        $numeros_aleatorios = array();
        for ($num = 1; $num <= 5; $num++) {
            $num_aleatorio = rand(1, 10);
            $numeros_aleatorios[] = $num_aleatorio;
        }
        for ($num = 0; $num <= 4; $num++) {
            echo "<p>$numeros_aleatorios[$num]</p>";
        }
        ?>
        <hr>
        <hr>
        <h3>2.-Crea un array con 10 números aleatorios entre 1 y 5, muéstralos en pantalla, y después, muestra la suma de todos ellos</h3>
        <?php
        $numeros_aleatorios = array();
        for ($num = 1; $num <= 10; $num++) {
            $num_aleatorio = rand(1, 5);
            $numeros_aleatorios[] = $num_aleatorio;
        }
        $suma = 0;
        for ($num = 0; $num <= 9; $num++) {
            echo "<p>$numeros_aleatorios[$num]</p>";
            $suma = $suma + $numeros_aleatorios[$num];
        }
        echo "<p>Los números suman: $suma</p>"
        ?>
        <hr>
        <hr>
        <h3>3.-Crea un array con 7 números entre 5 y 10, muéstralos en pantalla, y después indica cual es el mayor y cual el menor</h3>
        <?php
        $numeros_aleatorios = array();
        for ($num = 1; $num <= 7; $num++) {
            $numeros_aleatorios[] = rand(5, 10);
        }
        $mayor = 0;
        $menor = 10;
        for ($num = 0; $num <= 6; $num++) {
            echo "<p>$numeros_aleatorios[$num]</p>";
            if ($numeros_aleatorios[$num] > $mayor) {
                $mayor = $numeros_aleatorios[$num];
            }
            if ($numeros_aleatorios[$num] < $menor) {
                $menor = $numeros_aleatorios[$num];
            }
        }
        echo "<p>Mayor: $mayor // Menor: $menor</p>";
        ?>
    </center>

</body>

</html>