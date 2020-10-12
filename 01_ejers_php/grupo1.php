<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP - Grupo 1</title>
</head>
<body>
	<center>

		<h4>1.- Haz que se muestre en pantalla un mensaje con tu nombre y la fecha y hora actual (por ejemplo): Me llamo Carlos y hoy es: 2020-09-17, son las: 22:20:34</h4>
		<?php
			echo "<h3>Me llamo Javi y hoy es: " . date("y-m-d"). ", son las ".date("H:i:s")."</h3>";
		?>

		<hr>
		<h4>2.- Intenta obtener en una variable “numero” un número aleatorio entre 1 y 100 y muéstralo en pantalla</h4>
		<?php
			$numAleatorio = rand(1, 100);
			echo "<h3>Número aleatorio entre 1 y 100: " . $numAleatorio . "</h3>";
		?>
		
		<hr>
		<h4>3.- Si el número es mayor que 50 que salga un mensaje que diga “Es grande”, y si no que muestre “Es pequeño”.</h4>
		<?php
			if ($numAleatorio > 50) {
				echo "<h3>El número es grande" . "</h3>";
			} else {
				echo "<h3>El número es pequeño" . "</h3>";
			}
		?>
		
		<hr>
		<h4>4.- Con la ayuda de Internet, intenta deducir si es par o es impar, y que muestre un mensaje en pantalla.</h4>
		<?php
			if ($numAleatorio % 2 == 0) { // el operador % devuelve el resto de una división
				echo "<h3>El número $numAleatorio es par" . "</h3>";
			} else {
				echo "<h3>El número $numAleatorio es impar" . "</h3>";
			}
		?>
		
		<hr>
		<h4>5.- Con un bucle FOR, muestra en pantalla 5 números aleatorios entre 1 y 10.</h4>
		<h4>6.- Calcula en una variable la suma de los 5 números aleatorios y que se muestre también.</h4>
		<h4>7.- Intenta calcular en dos nuevas variables “maximo” y “minimo” y mostrar en pantalla cuales de entre los 5 números aleatorios son el mayor y el menor.</h4>
		<?php
			$suma = 0;
			$min = 11;
			$max = 0;
			for ($i = 1; $i < 6; $i++) {
				$num = rand(1, 10);
				$suma = $suma + $num;
				if ($num>$max){
					$max=$num;
				}if ($num<$min){
					$min=$num;
				}
				echo "<h3>Número: $num" . "</h3>";
			}
			echo "<h3>Suma: $suma" . "</h3>";
			echo "<h3>Mínimo: $min" . "</h3>";
			echo "<h3>Máximo: $max" . "</h3>";
		?>
		
		<hr>
		<h4>8.- Mediante un bucle While, que muestre en pantalla los numeros impares del 1 al 15</h4>
		<?php
			$contador = 0;
			$impar = 1;
			while ($impar <= 15) {
				echo "<h3>El número $impar es impar</h3>";
				$impar = $impar + 2;
				$contador = $contador + 1;
			}
		?>
		
		<hr>
		<h4>9.- Intenta mostrar en pantalla la hora actual (solo la hora, sin la fecha)</h4>
		<?php
			echo "<h3>La hora actual es: " . date("H:i:s") . "</h3>";
		?>
		
		<hr>
		<h4>10.- Mediante un bucle while, que el ordenador vaya obteniendo y mostrando números aleatorios entre 1 y 10, y pare cuando obtenga el 5.</h4>
		<?php
			$numAleat = rand(1, 10);
			while ($numAleat != 5) {
				echo "<h3>Num: $numAleat </h3>";
				$numAleat = rand(1, 10);
			}
			if ($numAleat == 5) {
				echo "<h3>Num: $numAleat </h3>";
			}
		?>
		<h4>10.1- Lo mismo pero con do...while</h4>
		<?php
			do{
				$numAleat = rand(1, 10);
				echo "<h3>Num: $numAleat </h3>";
			}			
			while ($numAleat != 5);			
		?>
	</center>
</body>
</html>