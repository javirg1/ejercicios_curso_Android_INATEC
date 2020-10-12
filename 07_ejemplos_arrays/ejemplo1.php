<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplos arrays</title>
</head>
<body>
	<center>
		<h3>Ejemplo de uso de arrays</h3>

		<p>Inventate cinco numeros entre 1 y 100 y muestralos ordenados Mayor a Menor:</p>
		<?php
		//Voy a obtener los números aleatorios y meterlos en un array (en una lista), para poder ordenarlos antes de pintarlos en pantalla:

		//Obtengo los 5 numeros aleatorios, en el orden que salgan y los guardo en una variable de tipo array

		//Primero declaro una variable de tipo array:
		$numeros_aleatorios = array();
		//Mediante un bucle me invento los 5 numeros y los guardo en el array:
		for ($num=1;$num<=5;$num++) {
			$num_aleatorio = rand(1,100);
			//Lo añado a la lista (array), empieza a contar desde 0:
			$numeros_aleatorios[] = $num_aleatorio;
		}
		//Pinto los números tal como han salido:
		echo "<p>LA LISTA TAL CUAL SALE</p>";
		for ($posicion=0;$posicion<5;$posicion++) {
			echo "<p>$numeros_aleatorios[$posicion]</p>";
		}

		//Una vez que tengo los números, voy a ordenarlos de mayor a menor, antes de pintarlos en pantalla:
		$pos_referencia = 0;
		for ($pos_referencia = 0; $pos_referencia<5; $pos_referencia++) {
			for ($posicion=$pos_referencia;$posicion<5;$posicion++) {
				if ($numeros_aleatorios[$pos_referencia] < $numeros_aleatorios[$posicion]) {
					//He encontrado uno mayor, intercambio las posiciones:
					$auxiliar = $numeros_aleatorios[$posicion];
					$numeros_aleatorios[$posicion] = $numeros_aleatorios[$pos_referencia];
					$numeros_aleatorios[$pos_referencia] = $auxiliar;
				}
			}
		}
		
		//Finalmente pinto los numeros ordenados:
		echo "<p>LA LISTA TRAS LA PRIMERA VUELTA (DEBERIA ESTAR PRIMERO EL MAYOR)</p>";
		for ($posicion=0;$posicion<5;$posicion++) {
			echo "<p>$numeros_aleatorios[$posicion]</p>";
		}

		?>

	</center>
</body>
</html>