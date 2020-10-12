<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo de uso de formularios</title>
</head>
<body>
	<center>
		<h3>Ejemplo de uso de formularios</h3>

		<h4>Formulario de login</h4>

		<form>
			<p>Introduce email:</p>
			<p><input type="text"/></p>

			<p>Introduce password:</p>
			<p><input type="password"/></p>

			<p>Introduce edad:</p>
			<p><input type="number" min="1" max="100"/></p>

			<p><input type="checkbox"/>Acepto las condiciones</p>

			<p><input type="radio"/>Version movil</p>
			<p><input type="radio"/>Version web</p>

			<p>
				<select name="operacion">
					<option id="1">De mañana</option>
					<option id="2">De tarde</option>
					<option>De noche</option>
				</select>
			</p>
			<p>Observaciones:</p>
			<p><textarea></textarea></p>
			<p>Adjuntar foto:</p>
			<input type="file"/>

			<p><input type="submit" value="Validar"/></p>

		</form>
	</center>
</body>
</html>