<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Calculadora</title>
</head>
<body>
	<center>
		<h3>Formulario para calcular operaciones</h3>


		<form action="operar.php" method="post">
			<p>Introduce primer número:</p>
			<p><input type="number" name="caja_num1" size="10" required="true"/>

			<p>Selecciona operación:</p>
			<select name="caja_operacion" required="true">
				<option value="0">+ (Suma)</option>
				<option value="1">- (Resta)</option>
				<option value="2">* (Multi)</option>
				<option value="3">/ (Div)</option>
			</select>

			<p>Introduce segundo número:</p>
			<p><input type="number" name="caja_num2" size="10" required="true"/>

			<p><input type="submit" value="Calcular"/></p>

		</form>

	</center>
</body>
</html>