<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Calculadora</title>
</head>
<body>
	<center>
		<h3>Resultado de la operación</h3>

		<p>Datos recogidos:</p>

		<?php
		$num1 = $_POST["caja_num1"];
		//echo "<p>Num1: $num1</p>";
		$num2 = $_POST["caja_num2"];
		//echo "<p>Num2: $num2</p>";
		$op = $_POST["caja_operacion"];
		//echo "<p>OP: $op</p>";

		//Hacemos la operación:
		$resultado = 0;
		$signos = ["+","-","*","/"];

		switch ($op) {
			case 0:
				$resultado = $num1 + $num2;
				break;
			case 1:
				$resultado = $num1 - $num2;
				break;
			case 2:
				$resultado = $num1 * $num2;
				break;
			case 3:
				if ($num2 == 0) {
					$resultado = "División por 0 no válida";
				} else {
					$resultado = round($num1 / $num2,2);
				}
				break;
			default:
				//Me ha llegado un value de operacion desconocido
				$signo = "??";
				$resultado = "Operación desconocida";
				break;
		}
		if ($op>=0 && $op<=3) $signo = $signos[$op];
		echo "<p>$num1 $signo $num2 = $resultado</p>";
		?>
		<p><a href="formulario.php">Hacer otra operación</a></p>

	</center>
</body>
</html>