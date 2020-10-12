<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejers Funciones - Arrays Grupo 2</title>
</head>
<body>
<?php
//Declarar las funciones que me hagan falta:
function mostrar_en_pantalla($lista_numeros) {
	//Me pasan como parametro un array y lo muestro en pantalla:
	echo "<p>";
	for($pos=0;$pos<count($lista_numeros);$pos++) {
		echo "    $lista_numeros[$pos]    ";
	}
	echo "</p>";
}
//Se inventa un array de numeros aleatorios. El último parámetro $respes, es un booleano true/false, que indica si puede haber números repetidos o no:
function crear_array($longitud, $minimo, $maximo, $repes) {
	$combinacion = array();
	//Inicializamos el array combinación con números no válidos (es decir, que no estén entre $minimo y $maximo), por ejemplo 0
	for ($pos=0;$pos<$longitud;$pos++) {
		$combinacion[$pos] = $minimo-1;
	}
	//La combinación existe, son todo 0s, no es válida, pero ahora irá cambiando:
	for ($pos=0;$pos<$longitud;$pos++) {
		$numero = rand($minimo, $maximo);
		//Dependiendo de si se admiten repes o no, lo añado directamente al array o compruebo si ya estaba en el array:
		if ($repes == true) {
			//Se admiten valores repetidos, lo añado directamente al array:
			$combinacion[$pos] = $numero;
		} else {
			//Voy a comprobar si $numero ya está en la combinación:
			//Supongo que el número no está:
			$ya_existe = false;
			//Me recorro todos los números de la combinación, y si encuentro $numero, pongo la variable $ya_esta a true:
			for ($posicion=0;$posicion<$longitud;$posicion++) {
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
	}
	return $combinacion;
}
//Esta función recibe un array un segundo parametro $resto, que si es 0 devuelve la cantidad de números pares que hay en el array, y si es un 1, me devuelve la cantidad de impares:
function contar_pares_impares($lista_numeros, $resto) {
	$total = 0;
	//Recorro el array $numeros, buscando los números pares ($resto es 0) o impares ($resto es 1):
	for ($pos=0;$pos<count($lista_numeros);$pos++) {
		if ($lista_numeros[$pos] % 2 == $resto) {
			//Detectado numero que busco, le sumo 1 al contador:
			$total++;
		}
	}
	return $total;
}
//Esta función recibe un array y desordena su contenido:
function desordenar_array($lista_numeros) {
	//Desordeno el contenido: Voy a intercambiar el contenido de las casillas a boleo:
	for ($veces=1;$veces <=10; $veces++) {
		//intercambio las posiciones:
		//Obtengo el tamaño del array (Por ejemplo, si tiene ya elementos, las posiciones van del 0 al 9, en general a la longitud  - 1)
		$longitud = count($lista_numeros)-1;
		//Obtengo dos posiciones a boleo, entre 0 y 9:
		$posicion = rand(0,$longitud);
		$pos_referencia = rand(0,$longitud);
		//Intercambiar los contenidos de estas posiciones:
		$auxiliar = $lista_numeros[$posicion];
		$lista_numeros[$posicion] = $lista_numeros[$pos_referencia];
		$lista_numeros[$pos_referencia] = $auxiliar;
	}
	return $lista_numeros;
}
//Se inventa un array de numeros aleatorios:
function crear_array_con_pares($longitud, $minimo, $maximo) {
	$numeros = array();
	for ($num=1;$num<=$longitud;$num++){
		$numero = rand($minimo, $maximo);
		if ($numero % 2 == 0) {
			$numeros[] = $numero;
		} else {
			$num--;
		}
	}
	return $numeros;
}
//Esta funcion muestra en pantalla las veces que ha salido cada número que hay en un array:
function mostrar_repeticiones_numeros_array($lista_numeros,$minimo,$maximo) {
	for ($num=$minimo;$num<=$maximo;$num++) {
		//Ahora cuento las veces que ha salido cada numero entre el minimo y el maximo
		$contador = 0;
		for ($pos=0;$pos<count($lista_numeros);$pos++) {
			if ($lista_numeros[$pos] == $num ) {
				$contador++;
			}
		}
		//Ya puedo pintar en pantalla las veces que ha salido $num:
		echo "<p>El número $num ha salido: $contador</p>";
	}
}
?>
	<center>
		<h2>Ejers Funciones - Arrays Grupo 2: Hacemos con funciones los ejercicios hechos anteriormente</h2>

		<h3>1.- Crea un array con 10 números aleatorios entre 1 y 10. Muéstralos en pantalla. Al finalizar que nos muestre cuantos de ellos son pares y cuantos son impares</h3>

		<?php
		$numeros = crear_array(10,1,10,true);
		//Pintar en pantalla:
		mostrar_en_pantalla($numeros);
		//Muestro pares e impares:
		?>
		<p>Total pares: <?php echo contar_pares_impares($numeros,0) ?></p>
		<p>Total impares: <?php echo contar_pares_impares($numeros,1) ?></p>


		<h3>2.-Crea un array que contenga los números del 0 al 9 todos seguidos. Muéstralos en pantalla. Desordena las posiciones de tal forma que ya no estén seguidos. Muestra como ha quedado en pantalla.</h3>
		<?php
		$numeros = array();
		for($num=0;$num<=9;$num++) {
			$numeros[] = $num;
		}
		//Pintar en pantalla:
		mostrar_en_pantalla($numeros);
		//Llamar a la función que desordena:
		$numeros = desordenar_array($numeros);
		//Vuelvo a pintar el array en pantalla, para ver como queda desordenado:
		mostrar_en_pantalla($numeros);
		?>

		<h3>3.-Crea un array con 5 números aleatorios entre 1 y 100, pero solo pueden ser pares. Muestralo en pantalla</h3>
		<?php
		$numeros = crear_array_con_pares(5,1,100);
		//Pintar en pantalla:
		mostrar_en_pantalla($numeros);
		?>

		<h3>4.-Crea un array con 5 números aleatorios entre 1 y 7. Muéstralos en pantalla. Después indica cuantas veces ha salido cada número del 1 al 7, por ejemplo:</h3>

		<p>-Obtengo estos números: 4 – 2 -1 -2 -5</p>

		<p>-Me debe indicar:  El 1 ha salido 1 vez – El 2 ha salido 2 veces – El 3 ha salido 0 veces – El 4 ha salido 1 vez – El 5 ha salido 1 vez – El 6 ha salido 0 veces – El 7 ha salido 0 veces</p>
		<?php
		$numeros = crear_array(5,1,7,true);
		//Pintar en pantalla:
		mostrar_en_pantalla($numeros);
		//Mostrar en pantalla las veces que ha salido cada número:
		mostrar_repeticiones_numeros_array($numeros,1,7);
		?>

		<h3>5.-Crea un array con 6 números aleatorios entre 1 y 49, pero no puede repetirse ninguno (como si fuese una combinación de la lotería primitiva)</h3>
		<?php
		$numeros = crear_array(6,1,49,false);
		//Pintar en pantalla:
		mostrar_en_pantalla($numeros);
		?>
	</center>
</body>
</html>