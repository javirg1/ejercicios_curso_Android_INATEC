<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos con arrays – Grupo 2
    </title>
</head>

<body>
    <center>
        <h3 style='color:blue'>1.- Crea un array con 10 números aleatorios entre 1 y 10. Muéstralos en pantalla. Al
            finalizar que nos muestre cuantos de ellos son pares y cuantos son impares</h3>
        <?php
        $num = array();
        $par = 0;
        $impar = 0;
        for ($n = 0; $n <= 9; $n++) {
            $num[] = rand(1, 10);
            echo "$num[$n] ";
            if ($num[$n] % 2 == 0) {
                $par++;
            }
        }
        $impar = 10 - $par;
        echo "<p>Han salido $par números pares y $impar números impares";
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>2.-Crea un array que contenga los números del 0 al 9 todos seguidos. Muéstralos en
            pantalla. Desordena las posiciones de tal forma que ya no estén seguidos. Muestra como ha quedado en
            pantalla.</h3>
        <?php
        $numeros = array();
        for ($n = 0; $n <= 9; $n++) {
            $numeros[] = $n;
        }
        echo "Números ordenados:<br><br>";
        for ($n = 0; $n <= 9; $n++) {
            echo "$numeros[$n] ";
        }
        echo "<br><br>";
        for ($veces = 0; $veces <= 10; $veces++) {
            $posicion = rand(0, 9);
            $pos_referencia = rand(0, 9);
            $auxiliar = $numeros[$posicion];
            $numeros[$posicion] = $numeros[$pos_referencia];
            $numeros[$pos_referencia] = $auxiliar;
        }
        echo "Números desordenados:<br><br>";
        for ($n = 0; $n <= 9; $n++) {
            echo "$numeros[$n] ";
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>3.-Crea un array con 5 números aleatorios entre 1 y 100, pero solo pueden ser pares.</h3>
        <?php
        $pares = array();
        $cont = 0;
        while ($cont < 5) {
            $num = rand(1, 100);
            if ($num % 2 == 0) {
                $pares[] = $num;
                $cont++;
            }
        }
        for ($n = 0; $n <= 4; $n++) {
            echo "$pares[$n] ";
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>4.-Crea un array con 5 números aleatorios entre 1 y 7. Muéstralos en pantalla. Después
            indica cuantas veces ha salido cada número del 1 al 7</h3>
        <?php
        $num = array();
        for ($n = 1; $n <= 5; $n++) {
            $num[] = rand(1, 7);
        }
        for ($n = 0; $n <= 4; $n++) {
            echo "$num[$n] ";
        }
        for ($n = 1; $n <= 7; $n++) {
            $contar = 0;
            for ($i = 0; $i <= 4; $i++) {
                if ($num[$i] == $n) {
                    $contar++;
                }
            }
            echo "<p>El nº $n ha salido $contar veces</p>";
        }
        ?>
        <hr>
        <hr>
        <h3 style='color:blue'>5.-Crea un array con 6 números aleatorios entre 1 y 49, pero no puede repetirse ninguno
            (como si fuese una combinación de la lotería primitiva)</h3>
        <?php
        /* $num = array();
                $num[] = rand(1, 49);
                $n_temp = 0;
                $repetido = false;
                while (count($num) < 6) {
                    $n_temp = rand(1, 49);
                    for ($i = 0; $i < count($num); $i++) {
                        if ($num[$i] == $n_temp) {
                            $repetido = true;
                        }
                    }
                    if ($repetido == false) {
                        $num[] = $n_temp;
                    }
                }
                for ($i = 0; $i < count($num); $i++) {
                    echo "$num[$i] ";
                } */
        //Declaro el array donde voy a guardar los 6 numeros aleatorios distintos:
        $combinacion = array();
        //Inicializamos el array combinación con números no válidos (es decir, que no estén entre 1 y 49), por ejemplo 0
        for ($pos = 0; $pos < 6; $pos++) {
            $combinacion[$pos] = 0;
        }
        //La combinación existe, son todo 0s, no es válida, pero ahora irá cambiando:
        for ($pos = 0; $pos < 6; $pos++) {
            $numero = rand(1, 49);
            //Voy a comprobar si $numero ya está en la combinación:
            //Supongo que el número no está:
            $ya_existe = false;
            //Me recorro todos los números de la combinación, y si encuentro $numero, pongo la variable $ya_esta a true:
            for ($posicion = 0; $posicion < 6; $posicion++) {
                if ($combinacion[$posicion] == $numero) {
                    $ya_existe = true;
                }
            }
            //Si no esta, lo añado a la combinación:
            if ($ya_existe == true) {
                //Este intento no vale
                $pos--;
            } else {
                //El número no lo tenía, lo añado a la combinación
                $combinacion[$pos] = $numero;
            }
        }
        //Pintar en pantalla la combinación:
        for ($pos = 0; $pos < 6; $pos++) {
            echo "<p>$combinacion[$pos]</p>";
        }

        ?>


    </center>

</body>

</html>