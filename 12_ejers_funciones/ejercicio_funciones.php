<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios implementación de funciones</title>
</head>

<body>
    <center>
        <?php

        //FUNCIONES EJERCICIOS 1 Y 2 ----------------------------------

        //Genera apuesta aleatoria

        function combi_apuesta()
        {
            $combinacion = array();
            for ($n = 0; $n < 6; $n++) {
                $combinacion[$n] = 0;
            }
            for ($n = 0; $n < count($combinacion); $n++) {
                $numero = rand(1, 49);
                $ya_existe = false;
                for ($posicion = 0; $posicion < 6; $posicion++) {
                    if ($combinacion[$posicion] == $numero) {
                        $ya_existe = true;
                    }
                }
                if ($ya_existe == true) {
                    $n--;
                } else {
                    $combinacion[$n] = $numero;
                }
            }
            return $combinacion;
        }

        //Genera apuesta ganadora aleatoria

        function combi_ganadora()
        {
            $combinacion = array();
            for ($n = 0; $n < 6; $n++) {
                $combinacion[$n] = 0;
            }
            for ($n = 0; $n < count($combinacion); $n++) {
                $numero = rand(1, 49);
                $ya_existe = false;
                for ($posicion = 0; $posicion < 6; $posicion++) {
                    if ($combinacion[$posicion] == $numero) {
                        $ya_existe = true;
                    }
                }
                if ($ya_existe == true) {
                    $n--;
                } else {
                    $combinacion[$n] = $numero;
                }
            }
            return $combinacion;
        }

        //Comprueba aciertos

        function comprobar_aciertos($apuesta, $ganadora)
        {
            $aciertos = 0;
            for ($i = 0; $i < count($apuesta); $i++) {
                for ($j = 0; $j < count($ganadora); $j++) {
                    if ($apuesta[$i] == $ganadora[$j]) {
                        $aciertos++;
                    }
                }
            }
            return $aciertos;
        }

        //FUNCIONES EJERCICIO 3 ---------------------------------------

        //Genera quiniela aleatoria

        function quiniela_aleatoria()
        {
            $q_aleatoria = array();
            $n = 0;
            for ($i = 0; $i <= 13; $i++) {
                $n = rand(1, 3);
                if ($n == 3) {
                    $q_aleatoria[$i] = "X";
                } else {
                    $q_aleatoria[$i] = "$n";
                }
            }
            return $q_aleatoria;
        }

        //Comprueba aciertos en quiniela apostada

        function busca_aciertos($q_apostada, $q_ganadora)
        {
            $acertados = 0;
            for ($i = 0; $i < count($q_apostada); $i++) {
                if ($q_apostada[$i] == $q_ganadora[$i]) {
                    $acertados++;
                }
            }
            return $acertados;
        }

        //Funcion inversion

        function inversion($q_ganadora)
        {
            $intentos = 0;
            $coste = 0;
            $q_apostada = quiniela_aleatoria();
            $ac = busca_aciertos($q_apostada, $q_ganadora);
            while ($intentos <= 10000 && $ac != 10) {
                $q_apostada = quiniela_aleatoria();
                $ac = busca_aciertos($q_apostada, $q_ganadora);
                $intentos++;
            }
            echo "Apostada<br><br>";
            for ($n = 0; $n < count($q_apostada); $n++) {
                echo "--$q_apostada[$n]--";
            }
            $coste = $intentos * 0.75;
            echo "<br><br>";
            echo "$ac aciertos en $intentos intentos";
            echo "<br><br>";
            echo "Coste: $coste € ($intentos intentos * 0,75 €)";
        }

        //FIN FUNCIONES------------------------------------------------

        ?>

        <h3 style='color:blue'>1.- Crea una combinación de seis números aleatorios entre 1 y 49 que no se repitan (la
            llamaremos “combi_apuesta”) pero utilizando una función que nos ayude a obtener la combinación completa,
            importante, sin que ningún número se repita.</h3>
        <hr>
        <hr>
        <h3 style='color:blue'>2.-Partiendo del ejercicios anterior, obtén una nueva combinación de 6 números aleatorios
            entre 1 y 49 (a la que llamaremos “combi_ganadora”), también con la ayuda de una función al igual que antes.
            En este caso mostraremos en pantalla las dos combinaciones, “combi_apuesta” y “combi_ganadora”. Por último
            añade el código necesario para comprobar los aciertos que ha tenido “combi_apuesta” según los números que
            han salido en “combi_ganadora”, a ser posible utilizando una función a la que llamaremos
            “comprobar_aciertos”</h3>

        <?php
        $apuesta = combi_apuesta();
        $ganadora = combi_ganadora();
        echo "Apuesta<br><br>";
        for ($n = 0; $n < count($apuesta); $n++) {
            echo "--$apuesta[$n]--";
        }
        echo "<br><br>";
        echo "Ganadora:<br><br>";
        for ($n = 0; $n < count($ganadora); $n++) {
            echo "--$ganadora[$n]--";
        }
        echo "<br><br>";
        echo "Aciertos: " . comprobar_aciertos($apuesta, $ganadora);
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>3.-Crea un array con la combinación de la quiniela ganadora de esta semana (o invéntate
            una combinación ganadora). Crea una función que se invente una apuesta de quiniela de forma aleatoria. Crea
            otra función que dadas dos combinaciones (ganadora y apuesta) nos diga el número de aciertos. Por último,
            crea una función llamada inversión que dada una combinación ganadora, se invente apuestas hasta que al menos
            obtenga 10 aciertos. Debe mostrar el número de intentos que ha hecho (número de apuestas que ha tenido que
            inventar hasta encontrar una con 10 aciertos) y el coste total teniendo en cuenta que cada apuesta cuesta
            0,75€. Pon un límite de 10000 intentos para evitar que el proceso se demore demasiado.</h3>
        <?php
        $q_ganadora = quiniela_aleatoria();
        echo "Ganadora<br><br>";
        for ($n = 0; $n < count($q_ganadora); $n++) {
            echo "--$q_ganadora[$n]--";
        }
        echo "<br><br>";
        echo inversion($q_ganadora);
        ?>
    </center>
</body>

</html>