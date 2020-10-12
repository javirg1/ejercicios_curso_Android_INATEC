<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP. Grupo 2</title>
</head>
<body>
	<center>
		<h3>1.-Intenta obtener en una variable un número aleatorio entre 1 y 100, lo muestre y nos diga si es múltiplo de 3 o no.</h3>
		<?php
			$num=rand(1,100);
			echo "<h4>Número aleatorio $num</h4>";
			if ($num%3==0){
				echo "<h4>El número $num ES múltiplo de 3</h4>";
			}else{
				echo "<h4>El número $num NO ES múltiplo de 3</h4>";
			}
		?>
		<hr><hr>
		<h3>2.-Mediante un bucle While, que muestre en pantalla los números pares del 2 al 20</h3>
		<?php
			$num=0;
			do{
				echo "<h4>$num</h4>";
				$num=$num+2;
			}while ($num<=20);
		?>
		<hr><hr>
		<h3>3.-Crea un bucle que nos muestre la tabla de multiplicar del 4 (Debe mostrar algo similar a esto.</h3>
		<?php
			$resultado=0;
			for ($n=1;$n<=10;$n++){
				$resultado=4*$n;
				echo "<h4>4 por $n es $resultado</h4>";
			}
		?>
		<hr><hr>
		<h3>4.-Crea un bucle que muestre 7 filas, y en cada una dos números aleatorios entre 1 y 5. El resultado esperado será similar a este:</h3>
		<?php
			for ($i=1;$i<=7;$i++){
				echo "<h4>Fila $i: ".rand(1,5)." - ".rand(1,5)."</h4>";
			}
		?>
		<hr><hr>
		<h3>5.- Crea un bucle que calcule dos números aleatorios entre 1 y 5, los muestre por filas (similar al ejercicio anterior) y además calcule y muestre la suma de ambos. El bucle debe terminar cuando la suma de ambos sea exactamente 7.</h3>
		<?php
			$num1=0;
			$num2=0;
			$suma=$num1+$num2;
			$contador=0;
			while ($suma!=7){
				$num1=rand(1,5);
				$num2=rand(1,5);
				$contador++;
				$suma=$num1+$num2;
				echo "<h4>Fila $contador: $num1 - $num2 Suma: $suma</h4>";
			}
		?>
		<hr><hr>
		<h3>6.-Crea un bucle que calcule dos números aleatorios entre 1 y 10, los muestre por filas (similar al ejercicio anterior pero sin calcular ni mostrar la suma). El bucle debe terminar cuando salga por primera vez un 7 en una fila (Da igual si es el primer o segundo número inventado de la fila).</h3>
		<?php
			$num1=0;
			$num2=0;
			$contador=0;
			while ($num1!=7 && $num2!=7){// && = and / || = or
				$num1=rand(1,10);
				$num2=rand(1,10);
				$contador++;
				echo "<h4>Fila $contador: $num1 - $num2</h4>";
			}
		?>
		<hr><hr>
		<h3>7.-Generador de quiniela aleatorio: Crea un código que muestre una apuesta de 9 resultados de quiniela de fútbol de forma aleatoria. El resultado que esperamos en pantalla son 9 pronósticos entre 1,X,2 similares a esto :</h3>
		<?php
			for ($i=1;$i<=9;$i++){
				$num=rand(1,3);
				if ($num==3){
					$resultado="X";
				}else{
					$resultado=$num;
				}
				echo "<h4>$i Equipo Casa - Equipo Fuera: $resultado</h4>";
			}
		?>
		<hr><hr>
		<h3>8.-Tabla de multiplicar: Crea un código que muestre la tabla completa de multiplicar, del 1 al 10.</h3>
		<?php
			for ($i=1;$i<=10;$i++){
				echo "<h4>TABLA DEL $i</h4>";
				for ($j=1;$j<=10;$j++){
					$mult=$i*$j;
					echo "<h5>$i por $j es $mult</h5>";
				}
			}
		?>
	</center>
</body>
</html>