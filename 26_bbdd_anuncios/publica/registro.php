<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Registro</title>
</head>
<body>
	
	<center>
		<h3>Formulario de registro</h3>

		<p>Introduce estos datos de registro:</p>

		<form action="controlador.php" method="post">
			<input type="hidden" name="op" value="2">
			<p>Introduce nombre:</p>
			<p><input type="text" name="caja_nombre" required="true" />

			<p>Introduce email:</p>
			<p><input type="email" name="caja_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true" />

			<p>Introduce password:</p>
			<p><input type="password" name="caja_password" required="true" />

			<p><input type="submit" value="Registrar"/></p>

			<p>Ya tienes cuenta? <a href="login.php">identifícate</a></p>

			<p>Volver al <a href="index.php">listado de anuncios</a></p>

		</form>

	</center>
</body>
</html>