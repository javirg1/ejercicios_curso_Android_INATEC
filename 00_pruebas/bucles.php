<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplos bucles</title>
</head>
<body>
	<center>
		<h2>Ejemplos de instrucciones de tipo bucle</h2>
		<p>Tenemos dos tipos de bucle</p>
		<p>El bucle for. Ejemplo: mostrar los números del 1 al 10</p>
		<?php
		for ($num=1;$num<=10;$num++){
			echo "<p>Número: $num</p>";
		}
		echo "<h3>Ya he puesto todos los números</h3>";

		echo "<h3>Ahora hacia atrás</h3>";
		for ($num=10;$num>=0;$num--){
			echo "<p>Número: $num</p>";
		}
		?>

	<hr>
	<h2>Ejercicios con el bucle for</h2>
	<h4>1.- Inventa un número aleatorio entre 5 y 10 y muestra todos los números entre 1 y el inventado</h4>
	<?php
	$final=rand(5,10);
	echo "<h4>Mostrará números entre el 1 y el $final</h4>";
	for ($n=1;$n<=$final;$n=$n+1){
		echo "$n ";
	}
	?>
	<hr>
	<h4>2.- Obtener la suma de los 5 primeros números</h4>
	<?php
	$suma=0;
	for ($n=1;$n<=5;$n++){
		$suma=$suma+$n;
	}
	echo "<h4>Los números suman $suma</h4>";
	?>
	<hr>
	<h4>3.- Obtener y mostrar 5 números aleatorios entre 1 y 10</h4>
	<?php
	for ($n=1;$n<=5;$n++){
		$num=rand(1,10);
		echo " $num ";
	}
	?>
	<hr>
	<h4>4.- Obtener y mostrar 8 números aleatorios entre 1 y 100. Al acabar mostrar la suma de todos ellos </h4>
	<?php
	$suma=0;
	for ($n=1;$n<=8;$n++){
		$num=rand(1,100);
		echo "   $num   ";
		$suma=$suma+$num;
	}
	echo "<p>La suma es: $suma</p>";
	?>
	<hr><hr><hr>
	<h2>El bucle While y Do...While</h2>
	<?php
	$contador=1;
	while ($contador<=5){
		$num=rand(1,10);
		echo "<p>Número inventado: $num</p>";
		$contador++;
	}
	?>
	<h3>6.- Ejemplo para ver diferencia de concepto entre el bucle FOR y el bucle WHILE</h3>
	<h4>Ejemplo: mostrar números aleatentre 1 y 10 hasta que obtenga el 7</h4>
	<?php
		$num=rand(1,10);
		echo "<p>Número inventado: $num</p>";
		while ($num!=7) {
			$num=rand(1,10);
			echo "<p>Número inventado: $num</p>";
		}
	?>
	<h4>El mismo caso con do...while y contando intentos</h4>
	<?php
		$intentos=0;
		do{
			$num=rand(1,10);
			echo "<p>Número inventado: $num</p>";
			$intentos++;
		}while($num!=7);
		echo "<h3>He tenido que hacer $intentos intentos</h3>";
	?>










	</center>
	
</body>
</html>