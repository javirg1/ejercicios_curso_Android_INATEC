<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP. Grupo 4</title>
</head>

<body>
	<center>
		<h3 style='color:blue'>1.- Crea un código php que obtenga la suma de los diez primeros números enteros entre 1 y 10.</h3>
		<?php
		$suma = 0;
		for ($n = 1; $n <= 10; $n++) {
			$suma = $suma + $n;
		}
		echo "<h4>La suma de los 10 primeros números enteros es: $suma<h4>";
		?>
		<hr>
		<hr>
		<h3 style='color:blue'>2.- Crea un código php que compruebe si dado un número aleatorio entre 1 y 10 es primo</h3>
		<?php
		$num = rand(1, 10);
		$contador = 0;
		for ($n = 1; $n <= 10; $n++) {
			if ($num % $n == 0) {
				$contador = $contador + 1;
			}
		}
		if ($contador > 2) {
			echo "<h4>El número $num no es un número primo<h4>";
		} else {
			echo "<h4>El número $num es un número primo<h4>";
		}
		?>
		<hr>
		<hr>
		<h3 style='color:blue'>3.- Crea un código php que se invente 5 números aleatorios entre 1 y 10, nos los muestre en pantalla y finalmente nos muestre un mensaje en el que muestre específicamente si ha salido el número 7 y cuantas veces</h3>
		<?php
		$contador = 0;
		for ($n = 1; $n <= 5; $n++) {
			$num = rand(1, 10);
			echo "$num ";
			if ($num == 7) {
				$contador++;
			}
		}
		if ($contador > 0) {
			echo " - Ha salido el nº 7 ($contador veces)";
		} else
			echo " - No ha salido el nº 7";
		?>
		<hr>
		<hr>
		<h3 style='color:blue'>4.- Crea un código php que se invente una fecha de forma aleatoria: Dia (1-31), Mes (1-12), teniendo en cuenta las características de los meses que tienen diferente número de días (Por ejemplo, Enero tiene 31, Febrero 28 (No consideramos años bisiestos), Marzo 31, Abril 30, etc…)</h3>
		<?php
		$mes = rand(1, 12);
		if ($mes == 2 || $mes == 4 || $mes == 6 || $mes == 9 || $mes == 11) {
			$dia = rand(1, 30);
		} else {
			$dia = rand(1, 31);
		}
		echo "$dia / $mes";
		?>
		<hr>
		<hr>
		<h3 style='color:blue'>5.- Crea un código php que se valore el precio de un alojamiento en un hotel en función del número de estrellas. De forma aleatoria debes mostrar tanto un número de estrellas del hotel (Entre 1 y 5), como un precio entre 30€ y 300 €. Se debe mostrar una valoración entre “Barato”, “Normal”, “Caro” según los siguientes requisitos:<br>
			*1-3 Estrellas: Barato (30-50€), Normal (51-80€), Caro (>81€)<br>
			*4 Estrellas: Barato (30-75€), Normal (76-100€), Caro (>101€)<br>
			*5 Estrellas: Barato (30-100€), Normal (101-180€), Caro (>181€)</h3>
		<?php
		$estrellas = rand(1, 5);
		$precio = rand(30, 300);
		$valoracion = "";
		if ($estrellas <= 3) {
			if ($precio < 50) {
				$valoracion = "Barato";
			} elseif ($precio > 50 && $precio <= 80) {
				$valoracion = "Normal";
			} else {
				$valoracion = "Caro";
			}
		}
		if ($estrellas == 4) {
			if ($precio < 75) {
				$valoracion = "Barato";
			} elseif ($precio > 76 && $precio <= 100) {
				$valoracion = "Normal";
			} else {
				$valoracion = "Caro";
			}
		}
		if ($estrellas == 5) {
			if ($precio < 100) {
				$valoracion = "Barato";
			} elseif ($precio > 101 && $precio <= 180) {
				$valoracion = "Normal";
			} else {
				$valoracion = "Caro";
			}
		}
		echo "<h4>Hotel $estrellas estrellas: $valoracion ($precio €)<h4>";
		?>
	</center>
</body>
</html>