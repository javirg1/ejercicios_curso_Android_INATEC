<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP</title>
</head>
<body>
	<center>
		<h3>Ejercicios básicos de programación PHP</h3>

		<h4>1.- Obtener un número aleatorio</h4>
		<?php
		$num_aleatorio = rand(1,10);
		echo "<h5>Número inventado: ".$num_aleatorio."<h5>";
		?>

		<hr>

		<h4>2.- Obtener un número aleatorio entre 1 y 5. Si sale el 4 mostrar mensaje "Acierto", sino mostrar mensaje "Fallo"</h4>

		<?php
		$num_aleatorio=rand(1,5);
		if ($num_aleatorio==4){
			echo "<h5>El número aleatorio es el ".$num_aleatorio." Acierto"."</h5>";
		}else{
			echo "<h5>El número aleatorio es el ".$num_aleatorio." Fallo"."</h5>";
		}
		?>

		<hr>

		<h4>3.- Inventa un número entre 1 y 10. Mostrar un mensaje que diga si el número es par o impar.</h4>

		<?php
		$num_aleatorio=rand(1,10);
		if ($num_aleatorio%2==0){
			echo "<h5>El número inventado es el: ".$num_aleatorio.". Es par<h5>";
		}else{
			echo "<h5>El número inventado es el: ".$num_aleatorio.". Es impar<h5>";
		}
		?>

		<hr>

		<h4>4.- Inventarnos dos números aleatorios entre 1 y 5. Mostrarlos por pantalla y añadir un mensaje que diga cual de los dos es mayor o si son iguales</h4>

		<?php
		$num_1=rand(1,5);
		$num_2=rand(1,5);
		echo "<h4>Primer número: ".$num_1."</h4>";
		echo "<h4>Segundo número: ".$num_2."</h4>";
		if ($num_1>$num_2){
			echo "<h4>El número ".$num_1." es mayor que el número ".$num_2;
		}elseif ($num_1<$num_2){
			echo "<h4>El número ".$num_1." es menor que el número ".$num_2;
		}else{
			echo "<h4>Los números son iguales</h4>";
		}
		?>





	</center>
	
</body>
</html>	