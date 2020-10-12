<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con funciones</title>
</head>

<body>
    <center>
        <h3 style='color:blue'>Ejemplo 2: Crear un array con 10 números aleatorios, mostrarlos en pantalla, y finalmente
            dar la siguiente información (Mayor, Menor, Media, Suma, Cuantos pares y Cuantos impares), todo ello
            mediante el uso de funciones auxiliares</h3>
        <?php

        // Función mayor

        function mayor($lista)
        {
            $max = 0;
            for ($i = 0; $i <= 9; $i++) {
                if ($lista[$i] > $max) {
                    $max = $lista[$i];
                }
            }
            return $max;
        }

        // Función menor

        function menor($lista)
        {
            $min = 10;
            for ($i = 0; $i <= 9; $i++) {
                if ($lista[$i] < $min) {
                    $min = $lista[$i];
                }
            }
            return $min;
        }

        // Función media


        function media($lista)
        {
            $suma = 0;
            for ($i = 0; $i <= 9; $i++) {
                $suma = $suma + $lista[$i];
            }
            $promedio = $suma / 10;
            return $promedio;
        }

        // Función suma


        function sum($lista)
        {
            $suma = 0;
            for ($i = 0; $i <= 9; $i++) {
                $suma = $suma + $lista[$i];
            }
            return $suma;
        }

        // Función pares


        function pares($lista)
        {
            $cont = 0;
            for ($i = 0; $i <= 9; $i++) {
                if ($lista[$i] % 2 == 0) {
                    $cont++;
                }
            }
            return $cont;
        }

        // Función impares


        function impares($lista)
        {
            $cont = 0;
            for ($i = 0; $i <= 9; $i++) {
                if ($lista[$i] % 2 != 0) {
                    $cont++;
                }
            }
            return $cont;
        }
        ?>

        <?php
        $num = array();
        for ($n = 1; $n <= 10; $n++) {
            $num[] = rand(1, 10);
        }
        for ($n = 0; $n <= 9; $n++) {
            echo "$num[$n] ";
        }
        $numero_mayor = mayor($num);
        $numero_menor = menor($num);
        $media_numeros = media($num);
        $suma_numeros = sum($num);
        $cuenta_pares = pares($num);
        $cuenta_impares = impares($num);

        echo "<p>El número mayor es el: $numero_mayor</p>";
        echo "<p>El número menor es el: $numero_menor</p>";
        echo "<p>La media de los números es: $media_numeros</p>";
        echo "<p>La suma de los números es: $suma_numeros</p>";
        echo "<p>Hay $cuenta_pares números pares</p>";
        echo "<p>Hay $cuenta_impares números impares</p>";
        ?>



    </center>
</body>

</html>