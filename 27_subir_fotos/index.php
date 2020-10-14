<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo Subir Fotos en un Formulario</title>
</head>
<body>
	<center>
		<h3>Ejemplo de formulario que envía un archivo al servidor</h3>

		<form method="post" action="procesar_formulario.php" enctype="multipart/form-data">

			<p>Tu nombre de usuario:
			<input type="text" name="inp_nombre_usuario"/></p>

			<p>Añadir imagen:</p>
			<input type="file" name="inp_imagen"/>


			<p><input type="submit" value="Enviar"/></p>

		</form>
	</center>
</body>
</html>