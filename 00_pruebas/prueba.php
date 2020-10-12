<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pruebas</title>
</head>
<body>
	<center>
		<h3>Mi primera página Web con HTML (zona arriba) y PHP</h3>
		<h4>Fecha actual desde HTML: 2020/09/14</h4>
		<h4>La hora a la que has cargado esta página: 11:11:50</h4>

		<hr/>
		<h3>Lo mismo con programación PHP</h3>

		<?php 
			//Lo primero aprender a poner comentarios en el código (en línea)
			/*
				Esto sería un comentario de bloque 
				Permite comentar grandes trozos simplemente abriendo y cerrando
			*/

			//El concepto mas importante en programación es el de variable:
			//Una variable se define con un nombre que empieza por el simbolo $

			//Definir una variable fecha_actual:
			$fecha_actual = "";	//Creo una variable sin contenido
			//Le asigno un contenido, la fecha actual:
			$fecha_actual = date("Y/m/d");
			//Ahora puedo utilizar esa variable:
			echo "<h3>Fecha actual desde PHP: ".$fecha_actual."</h3>";
			//Lo mismo con la hora (directamente creo la variable y le doy contenido):
			$hora_carga = date("H:i:s");
			echo "<h3>La hora a la q has cargado la página: ".$hora_carga."</h3>";

			/*
			//Instrucciones de control:
			si (dia_actual>15)
				pinta en pantalla "estamos en la segunda quincena del mes"
			sino
				pinta en pantalla "estamos en la primera"
			//vamos a escribirlo correctamente en PHP
			*/
			//Lo primero conseguir el día actual, solo el número 
			//Para ello defino una variable que contenga solamente el dia de hoy:
			$dia_actual = date("d");
			//Ahora ya puedo decidir con ese dato, si estamos en la 1ª quincena o 2ª
			if ($dia_actual > 15) {
				echo "<h3>Hoy es ".$dia_actual.", estamos en la segunda quincena del mes</h3>";
			} else {
				echo "<h3>Hoy es ".$dia_actual.", estamos en la primera quincena del mes</h3>";
			}

			//Obtener el segundo actual, y mostrar en pantalla
			$segundo_actual = date("s");
			echo "<h3>En este momento el segundo actual es: ".$segundo_actual."</h3>";

			//Comprobar el segundo actual obtenido, y si es mayor que 30, mostrar mensaje que diga "ha pasado mas de medio minuto" Y si no, mensaje sería "Aun no ha pasado medio minuto"
			if ($segundo_actual > 30) {
				echo "<h3>Ha pasado mas de medio minuto</h3>";
			} else {
				echo "<h3>Aún no ha pasado medio minuto</h3>";
			}
			//Obtener y mostrar el minuto y segundo actual:
			//Compara el minuto y el segundo actual, y según el resultado sacar un mensaje entre:
			//El minuto es mayor que el segundo / El minuto es igual q el segundo / El minuto es menor que el segundo:
			$minuto_actual = date("i");	//Con esto obtenemos el minuto actual
			//Ya podemos compara con el segundo:
			if ($minuto_actual > $segundo_actual) {
				echo "<h3>El minuto es mayor que el segundo</h3>";
			} else {
				//Compruebo si es igual y sino ya solo puede ser menor:
				if ($minuto_actual == $segundo_actual) {
					echo "<h3>El minuto es igual que el segundo</h3>";
				} else {
					//Ya solo queda una alternativa, es menor:
					echo "<h3>El minuto es menor que el segundo</h3>";
				}
			}


			//Obtener de forma individual y mostrar la hora, minuto y segundo actual.
			//Mostrar en pantalla
			//Calcular la suma de todos los tres números y mostrar en pantalla:
			$hora_actual = date("H");
			$min_actual = date("i");
			$seg_actual = date("s");

			//Mostrarlos
			echo "<h3>Hora: ".$hora_actual." Min: ".$min_actual. " Seg: ".$seg_actual."</h3>";
			//Calcular la suma en otra variable (pero solo con esto no veo el resultado):
			$suma = $hora_actual + $min_actual + $seg_actual;
			//Pinto en pantalla el resultado:
			echo "<h2>La suma es: ".$suma."</h2>";


		?>

	</center>
	
</body>
</html>