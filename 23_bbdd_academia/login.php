<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo formulario de login</title>
</head>
<body>
	
	<center>
		<h3>Formulario de login</h3>
		<?php
		//Compruebo si en la url (GET) viene alguna variable con error:
		if (isset($_GET["error"])) {
			echo "<p style='color:red'>".$_GET["error"]."<p>";
		}
		?>
		<p>Identificación</p>

		<form action="validar.php" method="post">
			<p>Introduce email:</p>
			<p><input type="email" name="caja_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />

			<p>Introduce password:</p>
			<p><input type="password" name="caja_password" />

			<p><input type="submit" value="Validar"/></p>

			<p>No tienes cuenta? <a href="registro.php">regístrate</a></p>

		</form>

	</center>
</body>
</html>